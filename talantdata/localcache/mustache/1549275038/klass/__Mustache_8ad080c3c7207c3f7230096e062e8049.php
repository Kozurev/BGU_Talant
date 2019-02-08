<?php

class __Mustache_8ad080c3c7207c3f7230096e062e8049 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<form action="';
        $value = $this->resolveValue($context->find('actionurl'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '" method="post" id="adminsettings">
';
        $buffer .= $indent . '    <div>
';
        $buffer .= $indent . '        <input type="hidden" name="sesskey" value="';
        $value = $this->resolveValue($context->find('sesskey'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '">
';
        $buffer .= $indent . '        <input type="hidden" name="action" value="save-settings">
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <fieldset>
';
        $buffer .= $indent . '        <div class="clearer"></div>
';
        // 'hasresults' section
        $value = $context->find('hasresults');
        $buffer .= $this->section5e92ea4374b03ae33dfa229605b7756c($context, $indent, $value);
        // 'hasresults' inverted section
        $value = $context->find('hasresults');
        if (empty($value)) {
            
            $buffer .= $indent . '            ';
            // 'str' section
            $value = $context->find('str');
            $buffer .= $this->section36817e26d3b370aa587ec3ea3b300e7a($context, $indent, $value);
            $buffer .= '
';
        }
        $buffer .= $indent . '    </fieldset>
';
        $buffer .= $indent . '</form>
';

        return $buffer;
    }

    private function section814f7ab309abbd3b4cf598dd0e446d9a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'searchresults, admin';
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
                
                $buffer .= 'searchresults, admin';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD19e3176d642e043d0f161863e32eb9b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <div class="clearer"></div>
                        {{{.}}}
                    ';
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
                
                $buffer .= $indent . '                        <div class="clearer"></div>
';
                $buffer .= $indent . '                        ';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= $value;
                $buffer .= '
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section73e8deaabdec5e1d422acbd7d05629ac(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <h2 class="main">{{#str}}searchresults, admin{{/str}} - <a href="{{url}}">{{{title}}}</a></h2>
                <fieldset class="adminsettings">
                    {{#settings}}
                        <div class="clearer"></div>
                        {{{.}}}
                    {{/settings}}
                </fieldset>
            ';
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
                
                $buffer .= $indent . '                <h2 class="main">';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section814f7ab309abbd3b4cf598dd0e446d9a($context, $indent, $value);
                $buffer .= ' - <a href="';
                $value = $this->resolveValue($context->find('url'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">';
                $value = $this->resolveValue($context->find('title'), $context);
                $buffer .= $value;
                $buffer .= '</a></h2>
';
                $buffer .= $indent . '                <fieldset class="adminsettings">
';
                // 'settings' section
                $value = $context->find('settings');
                $buffer .= $this->sectionD19e3176d642e043d0f161863e32eb9b($context, $indent, $value);
                $buffer .= $indent . '                </fieldset>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE5479b5825bee73d37f8a0a91fe85548(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'savechanges, admin';
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
                
                $buffer .= 'savechanges, admin';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionCb4ed807c624bd0e4bd4b6a782675b1c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="row">
                    <div class="offset-sm-3 col-sm-3">
                        <button type="submit" class="btn btn-primary">{{#str}}savechanges, admin{{/str}}</button>
                    </div>
                </div>
            ';
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
                
                $buffer .= $indent . '                <div class="row">
';
                $buffer .= $indent . '                    <div class="offset-sm-3 col-sm-3">
';
                $buffer .= $indent . '                        <button type="submit" class="btn btn-primary">';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionE5479b5825bee73d37f8a0a91fe85548($context, $indent, $value);
                $buffer .= '</button>
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5e92ea4374b03ae33dfa229605b7756c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{#results}}
                <h2 class="main">{{#str}}searchresults, admin{{/str}} - <a href="{{url}}">{{{title}}}</a></h2>
                <fieldset class="adminsettings">
                    {{#settings}}
                        <div class="clearer"></div>
                        {{{.}}}
                    {{/settings}}
                </fieldset>
            {{/results}}
            {{#showsave}}
                <div class="row">
                    <div class="offset-sm-3 col-sm-3">
                        <button type="submit" class="btn btn-primary">{{#str}}savechanges, admin{{/str}}</button>
                    </div>
                </div>
            {{/showsave}}
        ';
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
                
                // 'results' section
                $value = $context->find('results');
                $buffer .= $this->section73e8deaabdec5e1d422acbd7d05629ac($context, $indent, $value);
                // 'showsave' section
                $value = $context->find('showsave');
                $buffer .= $this->sectionCb4ed807c624bd0e4bd4b6a782675b1c($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section36817e26d3b370aa587ec3ea3b300e7a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'noresults, admin';
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
                
                $buffer .= 'noresults, admin';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
