<?php
/**
 * BlindTransfer action message.
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Boltunov Artem <dev@bluescarf.ru>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2011 Marcelo Gornstein <marcelog@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */
namespace PAMI\Message\Action;

/**
 * BlindTransfer action message.
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Boltunov Artem <dev@bluescarf.ru>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class BlindTransferAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel Transferer's channel.
     * @param string $extension Extension to transfer to.
     * @param string $context Context to transfer to.
     */
    public function __construct(string $channel, string $extension, string $context)
    {
        parent::__construct('BlindTransfer');
        $this->setKey('Channel', $channel);
        $this->setKey('Exten', $extension);
        $this->setKey('Context', $context);
    }
}
