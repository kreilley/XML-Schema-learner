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
 * Test class
 */
class slMainRegularExpressionOptimizerManagerTests extends PHPUnit_Framework_TestCase
{
    /**
     * Return test suite
     *
     * @return PHPUnit_Framework_TestSuite
     */
	public static function suite()
	{
		return new PHPUnit_Framework_TestSuite( __CLASS__ );
	}

    public function testOptimizeSingleIteration()
    {
        $optimizer = new slRegularExpressionOptimizer();
        $regexp = new slRegularExpressionSequence(
            new slRegularExpressionElement( 'a' )
        );

        $optimizer->optimize( $regexp );
        $this->assertEquals(
            new slRegularExpressionElement( 'a' ),
            $regexp
        );
    }

    public function testOptimizeDoubleIteration()
    {
        $optimizer = new slRegularExpressionOptimizer();
        $regexp = new slRegularExpressionSequence(
            new slRegularExpressionChoice(
                new slRegularExpressionElement( 'a' )
            )
        );

        $optimizer->optimize( $regexp );
        $this->assertEquals(
            new slRegularExpressionElement( 'a' ),
            $regexp
        );
    }

    public function testOptimizeOptionalEmpty()
    {
        $optimizer = new slRegularExpressionOptimizer();
        $regexp = new slRegularExpressionOptional(
            new slRegularExpressionEmpty()
        );

        $optimizer->optimize( $regexp );
        $this->assertEquals(
            new slRegularExpressionEmpty(),
            $regexp
        );
    }
}

