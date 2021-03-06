<?php
/**
 * Schema learning
 *
 * This file is part of XML-Schema-learner.
 *
 * XML-Schema-learner is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; version 3 of the
 * License.
 *
 * XML-Schema-learner is distributed in the hope that it will be
 * useful, but WITHOUT ANY WARRANTY; without even the implied warranty
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with XML-Schema-learner; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA
 * 02110-1301 USA
 *
 * @package Core
 * @version $Revision: 1236 $
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPL
 */

/**
 * K-local type inferencer
 *
 * Uses a configured ancestor depth to create type identifiers with the 
 * configured ancestor dependency.
 *
 * @package Core
 * @version $Revision: 1236 $
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GPL
 */
class slKLocalTypeInferencer extends slTypeInferencer
{
    /**
     * K, the ancestor dependency of a type.
     * 
     * @var int
     */
    protected $depth;

    /**
     * Construct from k, the ancestor dependency depth
     * 
     * @param int $k 
     * @return void
     */
    public function __construct( $k )
    {
        $this->depth = (int) $k;
    }

    /**
     * Inference a type from element
     *
     * Inference a string type from the path to the element in the XML tree.
     * 
     * @param array $path
     * @return string
     */
    public function inferenceType( array $path )
    {
        return implode( '/', array_map(
            function ( $pathElement )
            {
                return $pathElement['name'];
            },
            array_slice( $path, -( $this->depth + 1 ) )
        ) );
    }
}

