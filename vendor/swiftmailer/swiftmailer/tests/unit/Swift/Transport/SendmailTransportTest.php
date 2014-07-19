<?php

class Swift_Transport_SendmailTransportTest
    extends Swift_Transport_AbstractSmtpEventSupportTest
{
    protected function _getTransport($buf, $dispatcher = null, $command = '/usr/sbin/sendmail -bs')
    {
        if (!$dispatcher) {
            $dispatcher = $this->_createEventDispatcher();
        }
        $transport = new Swift_Transport_SendmailTransport($buf, $dispatcher);
        $transport->setCommand($command);

        return $transport;
    }

    protected function _getSendmail($buf, $dispatcher = null)
    {
        if (!$dispatcher) {
            $dispatcher = $this->_createEventDispatcher();
        }
        $sendmail = new Swift_Transport_SendmailTransport($buf, $dispatcher);

        return $sendmail;
    }

    public function testCommandCanBeSetAndFetched()
    {
        $buf = $this->_getBuffer();
        $sendmail = $this->_getSendmail($buf);

        $sendmail->setCommand('/usr/sbin/sendmail -bs');
        $this->assertEquals('/usr/sbin/sendmail -bs', $sendmail->getCommand());
        $sendmail->setCommand('/usr/sbin/sendmail -oi -t');
        $this->assertEquals('/usr/sbin/sendmail -oi -t', $sendmail->getCommand());
    }

    public function testSendingMessageIn_t_ModeUsesSimplePipe()
    {
        $buf = $this->_getBuffer();
        $sendmail = $this->_getSendmail($buf);
        $message = $this->_createMessage();

        $message->shouldReceive('getTo')
  