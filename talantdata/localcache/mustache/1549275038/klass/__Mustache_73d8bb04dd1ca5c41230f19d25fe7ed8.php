<?php

class __Mustache_73d8bb04dd1ca5c41230f19d25fe7ed8 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div id="timeline-view-';
        $value = $this->resolveValue($context->find('uniqid'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" data-region="timeline-view">
';
        $buffer .= $indent . '    <div class="d-flex justify-content-center">
';
        $buffer .= $indent . '        <ul class="nav nav-pills my-5">
';
        $buffer .= $indent . '            <li class="nav-item">
';
        $buffer .= $indent . '            <a class="nav-link active" href="#myoverview_timeline_dates" data-toggle="tab">
';
        $buffer .= $indent . '                ';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->sectionA0a09a26782b7b2b1a0bcc22146e1543($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '            </li>
';
        $buffer .= $indent . '            <li class="nav-item">
';
        $buffer .= $indent . '            <a class="nav-link" href="#myoverview_timeline_courses" data-toggle="tab">
';
        $buffer .= $indent . '                ';
        // 'str' section
        $value = $context->find('str');
        $buffer .= $this->section21be91719fa9b31bf4b1e8d52d95786f($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '            </li>
';
        $buffer .= $indent . '        </ul>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div class="tab-content">
';
        $buffer .= $indent . '        <div class="tab-pane active fade show" id="myoverview_timeline_dates">
';
        if ($partial = $this->mustache->loadPartial('block_myoverview/timeline-view-dates')) {
            $buffer .= $partial->renderInternal($context, $indent . '            ');
        }
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <div class="tab-pane fade" id="myoverview_timeline_courses">
';
        if ($partial = $this->mustache->loadPartial('block_myoverview/timeline-view-courses')) {
            $buffer .= $partial->renderInternal($context, $indent . '            ');
        }
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>';

        return $buffer;
    }

    private function sectionA0a09a26782b7b2b1a0bcc22146e1543(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' sortbydates, block_myoverview ';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' sortbydates, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section21be91719fa9b31bf4b1e8d52d95786f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' sortbycourses, block_myoverview ';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' sortbycourses, block_myoverview ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
