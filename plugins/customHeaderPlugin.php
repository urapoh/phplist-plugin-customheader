<?php

/**
 * customHeader plugin version 0.2
 * 
 * Includes one custom header inside every email sent
 *
 * @category  phplist
 * @author    Igor Drofman
 * @copyright 2019 Igor Drofman
 * @license   http://www.gnu.org/licenses/gpl.html GNU General Public License, Version 3
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 *
 *
 */

/**
 * Registers the plugin with phplist
 * 
 * @category  phplist
 * @package   customHeaderPlugin
 */

class customHeaderPlugin extends phplistPlugin
{
    /*
     *  Inherited variables
     */
    public $name = 'Custom header plugin';
    public $version = '0.2';
    public $enabled = true;
    public $authors = 'Igor Dorfman';
    public $description = 'Includes one custom header inside every email sent such as Feedback Loop header for Gmail';
	
	public $settings = array(
		"header_name" => array (
			'value' => "Feedback-ID",
			'description' => 'Defines custom header name',
			'type' => "text",
			'allowempty' => 0,
			'category'=> 'reporting',
		),
		"header_text" => array (
			'value' => "CampaignID",
			'description' => 'Defines custom header text',
			'type' => "text",
			'allowempty' => 0,
			'category'=> 'reporting',
		),
    );
    
    // This plugin has no web pages. So make sure that nothing appears in the 
	// dashboard menu
	function adminmenu() {
    	return array ();
  	}
	
	public function __construct()
    {

        $this->coderoot = dirname(__FILE__) . '/customHeaderPlugin/';
        
        parent::__construct();
    }
  
    
  /* messageHeaders  -- The original purpose of this function is:
   *
   * return headers for the message to be added, as "key => val"
   *
   * @param object $mail
   * @return array (headeritem => headervalue)
   *
   * Our use is to alter the subject line for the $mail object
   *
   * This is the last point at which we can reach into the queue processing and
   * modify the subject line.
   *
 */
  
    public function messageHeaders($mail)
    {
        return array(getConfig('header_name') => getConfig('header_text')); //@@@
    }
}
  