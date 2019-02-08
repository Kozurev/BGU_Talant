<?php

class __Mustache_7801b3ea918e9f65b891c3872a512ea8 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<input type="hidden" id="wwwroot" value="';
        $value = $this->resolveValue($context->findDot('config.wwwroot'), $context);
        $buffer .= $value;
        $buffer .= '" />
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_klass/navbar')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '<div class="header-main">
';
        $buffer .= $indent . '    <div class="header-main-content">
';
        $buffer .= $indent . '        <div class="container">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <div class="navbar">
';
        $buffer .= $indent . '                <div class="navbar-inner">
';
        $buffer .= $indent . '                <div id="logo">
';
        $buffer .= $indent . '                    <!--a href="';
        $value = $this->resolveValue($context->findDot('config.wwwroot'), $context);
        $buffer .= $value;
        $buffer .= '/?redirect=0" class="navbar-brand ';
        // 'logourl' section
        $value = $context->find('logourl');
        $buffer .= $this->sectionE1b7734efa381e40cb6792ff2d8c4194($context, $indent, $value);
        $buffer .= '
';
        // 'logourl' inverted section
        $value = $context->find('logourl');
        if (empty($value)) {
            
            $buffer .= $indent . '                    hidden-sm-down
';
        }
        $buffer .= $indent . '                    "-->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <a href="https://www.bsu.edu.ru/bsu/" target="_blank" class="navbar-brand ';
        // 'logourl' section
        $value = $context->find('logourl');
        $buffer .= $this->sectionE1b7734efa381e40cb6792ff2d8c4194($context, $indent, $value);
        $buffer .= '
';
        // 'logourl' inverted section
        $value = $context->find('logourl');
        if (empty($value)) {
            
            $buffer .= $indent . '                    hidden-sm-down
';
        }
        $buffer .= $indent . '                    ">
';
        $buffer .= $indent . '
';
        // 'logourl' section
        $value = $context->find('logourl');
        $buffer .= $this->section393fce6551f291b08ba242eb528b59ea($context, $indent, $value);
        // 'logourl' inverted section
        $value = $context->find('logourl');
        if (empty($value)) {
            
            $buffer .= $indent . '                    <span class="site-name hidden-sm-down">';
            $value = $this->resolveValue($context->find('sitename'), $context);
            $buffer .= $value;
            $buffer .= '</span>
';
        }
        $buffer .= $indent . '                    </a>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                <div class="collapse navbar-toggleable-md" id="navbarResponsive">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                <div class="infoarea ">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <span id="header-title">Таланты НИУ "БелГУ"</span>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                    <!-- custom_menu -->
';
        $buffer .= $indent . '                    ';
        $value = $this->resolveValue($context->findDot('output.custom_menu'), $context);
        $buffer .= $value;
        $buffer .= '
';
        $buffer .= $indent . '                    <!-- page_heading_menu -->
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <div class="clearfix"></div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '       </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</div>
';

        return $buffer;
    }

    private function sectionE1b7734efa381e40cb6792ff2d8c4194(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'has-logo';
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
                
                $buffer .= 'has-logo';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section393fce6551f291b08ba242eb528b59ea(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                    <span class="logo">
                        <img src="{{logourl}}" alt="{{sitename}}">
                    </span>
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
                
                $buffer .= $indent . '                    <span class="logo">
';
                $buffer .= $indent . '                        <img src="';
                $value = $this->resolveValue($context->find('logourl'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" alt="';
                $value = $this->resolveValue($context->find('sitename'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                    </span>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
