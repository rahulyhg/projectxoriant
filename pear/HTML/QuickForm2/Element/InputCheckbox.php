<?php
/**
 * Class for <input type="checkbox" /> elements
 *
 * PHP version 5
 *
 * LICENSE:
 * 
 * Copyright (c) 2006, 2007, Alexey Borzov <avb@php.net>,
 *                           Bertrand Mansion <golgote@mamasam.com>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *    * Redistributions of source code must retain the above copyright
 *      notice, this list of conditions and the following disclaimer.
 *    * Redistributions in binary form must reproduce the above copyright
 *      notice, this list of conditions and the following disclaimer in the 
 *      documentation and/or other materials provided with the distribution.
 *    * The names of the authors may not be used to endorse or promote products 
 *      derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS
 * IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY
 * OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   HTML
 * @package    HTML_QuickForm2
 * @author     Alexey Borzov <avb@php.net>
 * @author     Bertrand Mansion <golgote@mamasam.com>
 * @license    http://opensource.org/licenses/bsd-license.php New BSD License
 * @version    CVS: $Id: InputCheckbox.php,v 1.7 2007/06/30 17:39:41 avb Exp $
 * @link       http://pear.php.net/package/HTML_QuickForm2
 */

/**
 * Base class for checkboxes and radios
 */
require_once 'HTML/QuickForm2/Element/InputCheckable.php';

/**
 * Class for <input type="checkbox" /> elements 
 *
 * @category   HTML
 * @package    HTML_QuickForm2
 * @author     Alexey Borzov <avb@php.net>
 * @author     Bertrand Mansion <golgote@mamasam.com>
 * @version    Release: 0.2.0
 */
class HTML_QuickForm2_Element_InputCheckbox extends HTML_QuickForm2_Element_InputCheckable
{
    protected $attributes = array('type' => 'checkbox');

    protected $frozenHtml = array(
        'checked'   => '<tt>[x]</tt>',
        'unchecked' => '<tt>[&nbsp;]</tt>'
    );

    public function __construct($name = null, $attributes = null, array $data = array())
    {
        parent::__construct($name, $attributes, $data);
        if (!$this->getAttribute('value')) {
            $this->setAttribute('value', 1);
        }
    }

    protected function updateValue()
    {
        $name = $this->getName();
        foreach ($this->getDataSources() as $ds) {
            if (null !== ($value = $ds->getValue($name)) ||
                $ds instanceof HTML_QuickForm2_DataSource_Submit)
            {
                $this->setValue($value);
                return;
            }
        }
    }
}
?>
