<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis\PubSub;

use PredisTestCase;
use Predis\Client;
use Predis\Profile\ServerProfile;

/**
 * @group realm-pubsub
 */
class PubSubContextTest extends PredisTestCase
{
    /**
     * @group disconnected
     * @expectedException Predis\NotSupportedException
     * @expectedExceptionMessage The current profile does not support PUB/SUB related commands
     */
    public function testPubSubContextRequirePubSubRelatedCommand()
    {
        $profile = $this->getMock('Predis\Profile\ServerProfileInterface');
        $profile->expects($this->any())
                ->method('supportsCommands')
                ->will($this->returnValue(false));

        $client = new Client(null, array('profile' => $profile));
        $pubsub = new PubSubContext($client);
    }

    /**
     * @group disconnected
     * @expectedException Predis\NotSupportedException
     * @expectedExceptionMessage Cannot initialize a PUB/SUB context when using aggregated connections
     */
    public function testPubSubContextDoesNotWorkOnClusters()
    {
        $cluster = $this->getMock('Predis\Connection\ClusterConnectionInterface');

        $client = new Client($cluster);
 