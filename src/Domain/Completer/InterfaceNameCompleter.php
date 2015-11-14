<?php

namespace Domain\Completer;

use Domain\Core\Project;
use Domain\Core\Completion\Context;
use Domain\Core\Completion\Entry;

class InterfaceNameCompleter implements CompleterInterface {
    public function getEntries(Project $project, Context $context) {
        $entries = [];
        foreach ($project->getIndex()->getInterfaces() as $interface) {
            $fqcn = $interface->fqcn;
            $entries[] = new Entry($fqcn->toString());
        }
        return $entries;
    }
}
