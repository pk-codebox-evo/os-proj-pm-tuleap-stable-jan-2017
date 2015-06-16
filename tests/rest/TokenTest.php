<?php
/**
 * Copyright (c) Enalean, 2014 - 2015. All Rights Reserved.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

require_once dirname(__FILE__).'/../lib/autoload.php';

/**
 * @group TokenTests
 */
class TokenTest extends RestBase {

    /**
     * @expectedException Guzzle\Http\Exception\ClientErrorResponseException
     */
    public function testPostThrowExceptionIfUsernameDoesNotExist() {
        $this->getResponseWithoutAuth($this->client->post(
            'tokens',
            null,
            json_encode(array(
                "username" => 'I don\'t exists',
                "password" => 'pwd'
            ))
        ));
    }

    /**
     * @expectedException Guzzle\Http\Exception\ClientErrorResponseException
     */
    public function testPostThrowExceptionIfUsernameAndPaswordDoesNotMatch() {
        $this->getResponseWithoutAuth($this->client->post(
            'tokens',
            null,
            json_encode(array(
                "username" => REST_TestDataBuilder::TEST_USER_1_LDAPID,
                "password" => 'pwd'
            ))
        ));
    }
}