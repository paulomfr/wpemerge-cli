<?php

namespace WPEmerge\Cli\Presets;

use Symfony\Component\Console\Output\OutputInterface;

class Foundation implements PresetInterface {
	use FrontEndPresetTrait;

	/**
	 * {@inheritDoc}
	 */
	public function getName() {
		return 'Foundation';
	}

	/**
	 * {@inheritDoc}
	 */
	public function execute( $directory, OutputInterface $output ) {
		$this->installNodePackage( $directory, $output, 'foundation-sites', '^6.4', true );
		$this->addCssVendorImport( $directory, 'foundation-sites/dist/css/foundation.css' );
	}
}
