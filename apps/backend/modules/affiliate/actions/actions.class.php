<?php

require_once dirname(__FILE__).'/../lib/affiliateGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/affiliateGeneratorHelper.class.php';

/**
 * affiliate actions.
 *
 * @package    jobeet
 * @subpackage affiliate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class affiliateActions extends autoAffiliateActions
{
    public function executeListActivate()
    {
        $affiliate = $this->getRoute()->getObject();
        $affiliate->activate();
        
        // send an email to affiliate
        $message = Swift_Message::newInstance()
        ->setFrom('dilip@aum203.aum.com')
        ->setTo('gunvant@aum203.aum.com')
        ->setSubject('This is testing local mail send')
        ->setBody('Hi, i am just testing that we can send mail in local with symfony.');
        
        $this->getMailer()->send($message);
        
        $this->redirect('jobeet_affiliate');
    }
    
    public function executeListDeactivate()
    {
        $affiliate = $this->getRoute()->getObject();
        $affiliate->deactivate();
        
        // send an email to affiliate
        $message = Swift_Message::newInstance()
        ->setFrom('dilip@aum203.aum.com')
        ->setTo('gunvant@aum203.aum.com')
        ->setSubject('This is testing local mail send')
        ->setBody('Hi, i am just testing that we can send mail in local with symfony.');
        
        $this->getMailer()->send($message);
        
        
        $this->redirect('jobeet_affiliate');
    }
    
    public function executeBatchActivate(sfWebRequest $request)
    {
        $q = Doctrine_Query::create()
            ->from('JobeetAffiliate a')
            ->whereIn('a.id', $request->getParameter('ids'));
        $affiliates = $q->execute();
        
        foreach($affiliates as $affiliate)
        {
            $affiliate->activate();
        }
        
        $this->redirect('jobeet_affiliate');
    }
    
    public function executeBatchDeactivate(sfWebRequest $request)
    {
        $q = Doctrine_Query::create()
        ->from('JobeetAffiliate a')
        ->whereIn('a.id', $request->getParameter('ids'));
        $affiliates = $q->execute();
        
        foreach($affiliates as $affiliate)
        {
            $affiliate->deactivate();
        }
        
        $this->redirect('jobeet_affiliate');
    }
}
