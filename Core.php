<?php

	namespace helpers\Translator;

	class Core
	{
		/**
		*
		*/
		public function __construct( $xml , $fallbackFile = null )
		{
			$this->load( $xml );
			if ( $fallbackFile ){  $this->load( $fallbackFile ); }
			$debug = array( 'file' => $xml , 'fallback' => $fallbackFile , 'data' => $this->_data );
			ptc_log( $debug , 'Translation xml file loaded!' , 'Translator Helper Config' );
		}
		/**
		*
		*/
		public function getValues( ){ return $this->_data; }
		/**
		*
		*/
		protected function addValues( $xml )
		{
			foreach ( $xml->xpath( 'translation' ) as $child )
			{
				$key = ( string ) $child->attributes( )->key;
				if ( !isset( $this->_data[ $key ] ) ){ $this->_data[ $key ] = ( string ) $child[ 0 ]; }
			}
		}
		/**
		*
		*/
		public function load( $xml )
		{
			if ( !$file = realpath( $xml . '.xml' ) )
			{
				trigger_error( 'Translator could not load xml file ' . $xml . '.xml!' , E_USER_ERROR );
				return false;
			}
			$this->addValues( simplexml_load_file( $file ) );
			return $this;
		}
		/**
		*
		*/
		public function val( $value , $data = null )
		{
			$value = trim( $value );
			if ( !isset( $this->_data[ $value ] ) )
			{
				trigger_error( 'Translator could not find value ' . $value . '!' , E_USER_WARNING );
				return false;
			}
			if ( $data )
			{
				return $this->_parse( $this->_data[ $value ] , $data );
			}
			return $this->_data[ $value ];
		}
		/**
		*
		*/
		public function has( $value )
		{
			return array_key_exists( $value , $this->_data );
		}
		/**
		*
		*/
		public function removeValue($key){ $this->remove($key); }
		/**
		*
		*/
		public function deleteValue($key){ $this->remove($key); }
		/**
		*
		*/
		public function delete($key){ $this->remove($key); }
		/**
		*
		*/
		public function remove( $key ){ unset($this->_data[$key]); }
		/**
		*
		*/
		protected $_data = array( );
		/**
		*
		*/
		protected function _parse( $string , $data )
		{
			foreach ( $data as $k => $v )
			{
				if ( is_string( $v ) )
				{
					$string = str_replace( '{' . $k . '}' , $v , $string );
					continue;
				}
				if ( is_object( $v ) )
				{
					$v = ( array ) $v;
				}
				if ( !is_array( $v ) )
				{
					continue;
				}
				foreach ( $v as $key => $value ) 
				{
					if ( !is_string( $value ) )
					{
						continue;
					}
					// unfinished
					if ( preg_match_all( '#\[@(.*?)\({(.*?)\}\)\]#' , $string , $matches ) )
					{
						//ptc_log( $matches );
					}
					else
					{
						$string = str_replace( '{' . $k . '.' . $key . '}' , $value , $string );
					}
				}
			}
			return $string;
		}
	}
