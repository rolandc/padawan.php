<?php

namespace Domain\Completer;

use Domain\Core\Project;
use Domain\Core\Completion\Context;
use Domain\Core\Completion\Entry;

class NamespaceCompleter implements CompleterInterface {
    public function getEntries(Project $project, Context $context) {
        $entries = [];
        $postfix = trim($context->getData());
        foreach ($project->getIndex()->getFQCNs() AS $fqcn) {
            $namespace = $fqcn->getNamespace();
            if (!empty($postfix) && strpos($namespace, $postfix) === false) {
                continue;
            }
            $complete = str_replace($postfix, "", $namespace);
            $entries[$namespace] = new Entry($complete, "", "", $namespace);
        }
        $entries = array_values($entries);
        return $entries;
    }
}