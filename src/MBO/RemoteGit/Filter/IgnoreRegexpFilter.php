<?php

namespace MBO\RemoteGit\Filter;

use MBO\RemoteGit\ProjectInterface;
use MBO\RemoteGit\ProjectFilterInterface;

/**
 * Ignore project according to a regular expression
 */
class IgnoreRegexpFilter implements ProjectFilterInterface {

    /**
     * @var string
     */
    protected $ignoreRegexp;

    public function __construct($ignoreRegexp)
    {
        assert(!empty($ignoreRegexp));        
        $this->ignoreRegexp = $ignoreRegexp;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(){
        return "project name should not match /".$this->ignoreRegexp+"/";
    }

    /**
     * {@inheritDoc}
     */
    public function isAccepted(ProjectInterface $project)
    {
        if ( preg_match("/$this->ignoreRegexp/", $project->getName() ) ){
            return false;
        }else{
            return true;
        }
    }

}
