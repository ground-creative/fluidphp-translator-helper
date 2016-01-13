<?php

	namespace helpers\Translator;

	class Core
	{
		/**
		*
		*/
		public function __construct( $xml , $fallbackFile = null )
		{
			$this->_addValues( $this->_loadXML( $xml ) );
			if ( $fallbackFile ){ $this->_addValues( $this->_loadXML( $fallbackFile ) ); }
			$debug = array( 'file' => $xml , 'fallback' => $fallbackFile , 'data' => $this->_data );
			if ( function_exists( 'ptc_log' ) )
			{
				ptc_log( $debug , 'Translation xml file loaded!' , 'Translator Helper Config' );
			}
		}
		/**
		*
		*/
		public function getValues( ){ return $this->_data; }
		/**
		*
		*/
		public function val( $value )
		{
			$value = trim( $value );
			if ( !isset( $this->_data[ $value ] ) )
			{
				throw new \Exception( 'Translator could not load xml file ' . $xml . '.xml!' );
				return false;
			}
			return $this->_data[ $value ];
		}
		/**
		*
		*/
		protected $_data = array( );
		/**
		*
		*/
		protected function _loadXML( $xml )
		{
			if ( !$file = realpath( $xml . '.xml' ) )
			{
				throw new \Exception( 'Translator could not load xml file ' . $xml . '.xml!' );
				return false;
			}
			return simplexml_load_file( $file );
		}
		/**
		*
		*/
		protected function _addValues( $xml )
		{
			foreach ( $xml->xpath( 'translation' ) as $child )
			{
				$key = ( string ) $child->attributes( )->key;
				if ( !isset( $this->_data[ $key ] ) )
				{ 
					$this->_data[ $key ] = ( string ) $child[ 0 ];
				}
			}
		}
	}

	