<?php

namespace WPEmerge\Cli\Presets;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\RuntimeException;
use WPEmerge\Cli\NodePackageManagers\Proxy;

trait FrontEndPresetTrait {
	use StatementAppenderTrait;

	/**
	 * Install a node package
	 *
	 * @param  string          $directory
	 * @param  OutputInterface $directory
	 * @param  string          $package
	 * @param  string|null     $version
	 * @param  boolean         $dev
	 * @return void
	 */
	protected function installNodePackage( $directory, OutputInterface $output, $package, $version = null, $dev = false ) {
		$package_manager = new Proxy();

		if ( $package_manager->installed( $directory, $package ) ) {
			throw new RuntimeException( 'Package is already installed.' );
		}

		$package_manager->install( $directory, $output, $package, $version, $dev );
	}

	/**
	 * Install a node package
	 *
	 * @param  string $import
	 * @return void
	 */
	protected function addCssVendorImport( $directory, $import ) {
		$filepath = implode( DIRECTORY_SEPARATOR, [$directory, 'resources', 'styles', '_vendor.scss'] );
		$statement = '@import \'~' . $import . '\';';

		$this->appendUniqueStatement( $filepath, $statement );
	}
}
