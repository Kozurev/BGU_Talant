<?php

class __Mustache_96361f290f0f484a1e08ff49605205ab extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        // 'footerall' section
        $value = $context->find('footerall');
        $buffer .= $this->sectionEfbef3617062d4b3d27f82207e73c288($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!--E.O.Footer-->
';
        $buffer .= $indent . '
';
        $value = $this->resolveValue($context->findDot('output.standard_footer_html'), $context);
        $buffer .= $indent . $value;
        $buffer .= '
';
        $value = $this->resolveValue($context->findDot('output.standard_end_of_body_html'), $context);
        $buffer .= $indent . $value;
        $buffer .= '
';
        $buffer .= $indent . '
';
        // 'js' section
        $value = $context->find('js');
        $buffer .= $this->section118dc35aa27e33b5ed6706019f637f46($context, $indent, $value);

        return $buffer;
    }

    private function section8e9bc1ea2b4145b02ad0d7b8653c361d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                <img src="{{logourl_footer}}" alt="klass">
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
                
                $buffer .= $indent . '                                <img src="';
                $value = $this->resolveValue($context->find('logourl_footer'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" alt="klass">
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section17cbd20e796274fc7aa0bbeb067fdb3c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="{{colclass}}">
                    <div class="infoarea">
                        <div class="footer-logo">
                            <!--a href="{{config.wwwroot}}/?redirect=0"-->
                            <a href="https://www.bsu.edu.ru/bsu/" target="_blank">
                            {{# logourl_footer}}
                                <img src="{{logourl_footer}}" alt="klass">
                            {{/ logourl_footer}}
                            </a>
                        </div>
                        {{{footnote}}}
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
                
                $buffer .= $indent . '                <div class="';
                $value = $this->resolveValue($context->find('colclass'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                    <div class="infoarea">
';
                $buffer .= $indent . '                        <div class="footer-logo">
';
                $buffer .= $indent . '                            <!--a href="';
                $value = $this->resolveValue($context->findDot('config.wwwroot'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '/?redirect=0"-->
';
                $buffer .= $indent . '                            <a href="https://www.bsu.edu.ru/bsu/" target="_blank">
';
                // 'logourl_footer' section
                $value = $context->find('logourl_footer');
                $buffer .= $this->section8e9bc1ea2b4145b02ad0d7b8653c361d($context, $indent, $value);
                $buffer .= $indent . '                            </a>
';
                $buffer .= $indent . '                        </div>
';
                $buffer .= $indent . '                        ';
                $value = $this->resolveValue($context->find('footnote'), $context);
                $buffer .= $value;
                $buffer .= '
';
                $buffer .= $indent . '                     </div>
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF9e89d057573ffacb9027d38eb382650(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="{{colclass}}">
                    <div class="foot-links">
                        <h5>{{s_info}}</h5>
                        <ul>
                           {{{infolink}}}
                         </ul>
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
                
                $buffer .= $indent . '                <div class="';
                $value = $this->resolveValue($context->find('colclass'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                    <div class="foot-links">
';
                $buffer .= $indent . '                        <h5>';
                $value = $this->resolveValue($context->find('s_info'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</h5>
';
                $buffer .= $indent . '                        <ul>
';
                $buffer .= $indent . '                           ';
                $value = $this->resolveValue($context->find('infolink'), $context);
                $buffer .= $value;
                $buffer .= '
';
                $buffer .= $indent . '                         </ul>
';
                $buffer .= $indent . '                   </div>
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB2dc230eaa5f231a2c48da121e346b77(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{address}}';
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
                
                $value = $this->resolveValue($context->find('address'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD2445a6396ba5da070d7d0acece700ef(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <p><i class="fa fa-phone-square"></i>{{s_phone}} : {{phoneno}}</p>
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
                
                $buffer .= $indent . '                        <p><i class="fa fa-phone-square"></i>';
                $value = $this->resolveValue($context->find('s_phone'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= ' : ';
                $value = $this->resolveValue($context->find('phoneno'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</p>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF19795510ba9b1ec41ef47ff4f9ece30(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <p><i class="fa fa-envelope"></i>{{s_email}} : <a class="mail-link" href="mailto:{{emailid}}"> {{emailid}}</a></p>
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
                
                $buffer .= $indent . '                        <p><i class="fa fa-envelope"></i>';
                $value = $this->resolveValue($context->find('s_email'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= ' : <a class="mail-link" href="mailto:';
                $value = $this->resolveValue($context->find('emailid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '"> ';
                $value = $this->resolveValue($context->find('emailid'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</a></p>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3a5dcdab3438164e55e4559f860b8486(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="{{colclass}}">
                    <div class="contact-info">
                        <h5 class="nopadding">{{s_contact_us}}</h5>
                        <p>{{# address}}{{address}}{{/address}}</p>
                        {{# phoneno}}
                        <p><i class="fa fa-phone-square"></i>{{s_phone}} : {{phoneno}}</p>
                        {{/ phoneno}}
                        <!--p>По вопросам проведения олимпиады: Канищева Александра Владимировна <br/>
                        <i class="fa fa-envelope"></i>kanishcheva@bsu.edu.ru, <i class="fa fa-phone-square"></i>(4722) 30-18-39</p>
                        <p>Гальцев Александр Владимирович
                        <i class="fa fa-envelope"></i>galtsev@bsu.edu.ru, <i class="fa fa-phone-square"></i>(4722) 30-18-90</p>
                        <p>По вопросам обучения на подготовительных курсах:</p>
                        <p>Гималдинова Яна Асхатовна
                        <i class="fa fa-envelope"></i>gimaldinova@bsu.edu.ru,
                        <i class="fa fa-phone-square"></i>(4722) 30-18-79</p>
                        <p>Беленко Татьяна Владимировна
                        <i class="fa fa-envelope"></i>belenko_t@bsu.edu.ru, <i class="fa fa-phone-square"></i>(4722) 30-18-79</p-->
                        {{# emailid}}
                        <p><i class="fa fa-envelope"></i>{{s_email}} : <a class="mail-link" href="mailto:{{emailid}}"> {{emailid}}</a></p>
                        {{/ emailid}}
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
                
                $buffer .= $indent . '                <div class="';
                $value = $this->resolveValue($context->find('colclass'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                    <div class="contact-info">
';
                $buffer .= $indent . '                        <h5 class="nopadding">';
                $value = $this->resolveValue($context->find('s_contact_us'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</h5>
';
                $buffer .= $indent . '                        <p>';
                // 'address' section
                $value = $context->find('address');
                $buffer .= $this->sectionB2dc230eaa5f231a2c48da121e346b77($context, $indent, $value);
                $buffer .= '</p>
';
                // 'phoneno' section
                $value = $context->find('phoneno');
                $buffer .= $this->sectionD2445a6396ba5da070d7d0acece700ef($context, $indent, $value);
                $buffer .= $indent . '                        <!--p>По вопросам проведения олимпиады: Канищева Александра Владимировна <br/>
';
                $buffer .= $indent . '                        <i class="fa fa-envelope"></i>kanishcheva@bsu.edu.ru, <i class="fa fa-phone-square"></i>(4722) 30-18-39</p>
';
                $buffer .= $indent . '                        <p>Гальцев Александр Владимирович
';
                $buffer .= $indent . '                        <i class="fa fa-envelope"></i>galtsev@bsu.edu.ru, <i class="fa fa-phone-square"></i>(4722) 30-18-90</p>
';
                $buffer .= $indent . '                        <p>По вопросам обучения на подготовительных курсах:</p>
';
                $buffer .= $indent . '                        <p>Гималдинова Яна Асхатовна
';
                $buffer .= $indent . '                        <i class="fa fa-envelope"></i>gimaldinova@bsu.edu.ru,
';
                $buffer .= $indent . '                        <i class="fa fa-phone-square"></i>(4722) 30-18-79</p>
';
                $buffer .= $indent . '                        <p>Беленко Татьяна Владимировна
';
                $buffer .= $indent . '                        <i class="fa fa-envelope"></i>belenko_t@bsu.edu.ru, <i class="fa fa-phone-square"></i>(4722) 30-18-79</p-->
';
                // 'emailid' section
                $value = $context->find('emailid');
                $buffer .= $this->sectionF19795510ba9b1ec41ef47ff4f9ece30($context, $indent, $value);
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFf1be40b48a0b0f582a9cb290b8cb9ff(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li class="smedia-01">
                                <a href="{{fburl}}" target="_blank">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            </li>
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
                
                $buffer .= $indent . '                            <li class="smedia-01">
';
                $buffer .= $indent . '                                <a href="';
                $value = $this->resolveValue($context->find('fburl'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" target="_blank">
';
                $buffer .= $indent . '                                    <i class="fa fa-facebook-square"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section65b94dee43cd354f178519f8c189e90c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li class="smedia-02">
                                <a href="{{pinurl}}" target="_blank">
                                    <!--i class="fa fa-pinterest-square"></i-->
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>

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
                
                $buffer .= $indent . '                            <li class="smedia-02">
';
                $buffer .= $indent . '                                <a href="';
                $value = $this->resolveValue($context->find('pinurl'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" target="_blank">
';
                $buffer .= $indent . '                                    <!--i class="fa fa-pinterest-square"></i-->
';
                $buffer .= $indent . '                                    <i class="fa fa-instagram"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $buffer .= $indent . '
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6537ad1dd06cd8cd9a7c4dd715f51cfa(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li class="smedia-03">
                                <a href="{{twurl}}" target="_blank">
                                    <i class="fa fa-twitter-square"></i>
                                </a>
                            </li>
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
                
                $buffer .= $indent . '                            <li class="smedia-03">
';
                $buffer .= $indent . '                                <a href="';
                $value = $this->resolveValue($context->find('twurl'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" target="_blank">
';
                $buffer .= $indent . '                                    <i class="fa fa-twitter-square"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8bb6d4f437ea602cee814e47851b13fb(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                            <li class="smedia-04">
                                <a href="{{gpurl}}" target="_blank">
                                   <!--i class="fa fa-google-plus-square"></i-->
                                   <i class="fa fa-vk"></i>
                                </a>
                            </li>
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
                
                $buffer .= $indent . '                            <li class="smedia-04">
';
                $buffer .= $indent . '                                <a href="';
                $value = $this->resolveValue($context->find('gpurl'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '" target="_blank">
';
                $buffer .= $indent . '                                   <!--i class="fa fa-google-plus-square"></i-->
';
                $buffer .= $indent . '                                   <i class="fa fa-vk"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF334da07a40854c9a5842a91ce08f1eb(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="{{colclass}}">
                    <div class="social-media">
                    <h5>{{s_get_social}}</h5>
                    <ul>
                        {{# fburl}}
                            <li class="smedia-01">
                                <a href="{{fburl}}" target="_blank">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            </li>
                        {{/ fburl}}

                        {{# pinurl}}
                            <li class="smedia-02">
                                <a href="{{pinurl}}" target="_blank">
                                    <!--i class="fa fa-pinterest-square"></i-->
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>

                        {{/ pinurl}}
                        {{# twurl}}
                            <li class="smedia-03">
                                <a href="{{twurl}}" target="_blank">
                                    <i class="fa fa-twitter-square"></i>
                                </a>
                            </li>
                        {{/ twurl}}

                        {{# gpurl}}
                            <li class="smedia-04">
                                <a href="{{gpurl}}" target="_blank">
                                   <!--i class="fa fa-google-plus-square"></i-->
                                   <i class="fa fa-vk"></i>
                                </a>
                            </li>
                        {{/ gpurl}}

                            <li class="smedia-04">
                                <a href="https://www.youtube.com/channel/UCGhplVRA76lCQYVA_VymLHw" target="_blank">
                                   <!--i class="fa fa-google-plus-square"></i-->
                                   <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
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
                
                $buffer .= $indent . '                <div class="';
                $value = $this->resolveValue($context->find('colclass'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '                    <div class="social-media">
';
                $buffer .= $indent . '                    <h5>';
                $value = $this->resolveValue($context->find('s_get_social'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</h5>
';
                $buffer .= $indent . '                    <ul>
';
                // 'fburl' section
                $value = $context->find('fburl');
                $buffer .= $this->sectionFf1be40b48a0b0f582a9cb290b8cb9ff($context, $indent, $value);
                $buffer .= $indent . '
';
                // 'pinurl' section
                $value = $context->find('pinurl');
                $buffer .= $this->section65b94dee43cd354f178519f8c189e90c($context, $indent, $value);
                // 'twurl' section
                $value = $context->find('twurl');
                $buffer .= $this->section6537ad1dd06cd8cd9a7c4dd715f51cfa($context, $indent, $value);
                $buffer .= $indent . '
';
                // 'gpurl' section
                $value = $context->find('gpurl');
                $buffer .= $this->section8bb6d4f437ea602cee814e47851b13fb($context, $indent, $value);
                $buffer .= $indent . '
';
                $buffer .= $indent . '                            <li class="smedia-04">
';
                $buffer .= $indent . '                                <a href="https://www.youtube.com/channel/UCGhplVRA76lCQYVA_VymLHw" target="_blank">
';
                $buffer .= $indent . '                                   <!--i class="fa fa-google-plus-square"></i-->
';
                $buffer .= $indent . '                                   <i class="fa fa-youtube"></i>
';
                $buffer .= $indent . '                                </a>
';
                $buffer .= $indent . '                            </li>
';
                $buffer .= $indent . '                        </ul>
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

    private function section639d4c9d4e74d314e1ce77c5b0a43a42(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <p>{{{copyright_footer}}}</p>
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
                
                $buffer .= $indent . '                <p>';
                $value = $this->resolveValue($context->find('copyright_footer'), $context);
                $buffer .= $value;
                $buffer .= '</p>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEfbef3617062d4b3d27f82207e73c288(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
<footer id="footer" class="py-1 bg-inverse">
   <div class="footer-main">
        <div class="container">
            <div class="row">
            {{#block1}}
                <div class="{{colclass}}">
                    <div class="infoarea">
                        <div class="footer-logo">
                            <!--a href="{{config.wwwroot}}/?redirect=0"-->
                            <a href="https://www.bsu.edu.ru/bsu/" target="_blank">
                            {{# logourl_footer}}
                                <img src="{{logourl_footer}}" alt="klass">
                            {{/ logourl_footer}}
                            </a>
                        </div>
                        {{{footnote}}}
                     </div>
                </div>
                {{/block1}}
                {{# infolink}}
                <div class="{{colclass}}">
                    <div class="foot-links">
                        <h5>{{s_info}}</h5>
                        <ul>
                           {{{infolink}}}
                         </ul>
                   </div>
                </div>
                {{/ infolink}}
                 {{# contact}}
                <div class="{{colclass}}">
                    <div class="contact-info">
                        <h5 class="nopadding">{{s_contact_us}}</h5>
                        <p>{{# address}}{{address}}{{/address}}</p>
                        {{# phoneno}}
                        <p><i class="fa fa-phone-square"></i>{{s_phone}} : {{phoneno}}</p>
                        {{/ phoneno}}
                        <!--p>По вопросам проведения олимпиады: Канищева Александра Владимировна <br/>
                        <i class="fa fa-envelope"></i>kanishcheva@bsu.edu.ru, <i class="fa fa-phone-square"></i>(4722) 30-18-39</p>
                        <p>Гальцев Александр Владимирович
                        <i class="fa fa-envelope"></i>galtsev@bsu.edu.ru, <i class="fa fa-phone-square"></i>(4722) 30-18-90</p>
                        <p>По вопросам обучения на подготовительных курсах:</p>
                        <p>Гималдинова Яна Асхатовна
                        <i class="fa fa-envelope"></i>gimaldinova@bsu.edu.ru,
                        <i class="fa fa-phone-square"></i>(4722) 30-18-79</p>
                        <p>Беленко Татьяна Владимировна
                        <i class="fa fa-envelope"></i>belenko_t@bsu.edu.ru, <i class="fa fa-phone-square"></i>(4722) 30-18-79</p-->
                        {{# emailid}}
                        <p><i class="fa fa-envelope"></i>{{s_email}} : <a class="mail-link" href="mailto:{{emailid}}"> {{emailid}}</a></p>
                        {{/ emailid}}
                    </div>
                </div>
                {{/ contact}}
            {{# url }}
                <div class="{{colclass}}">
                    <div class="social-media">
                    <h5>{{s_get_social}}</h5>
                    <ul>
                        {{# fburl}}
                            <li class="smedia-01">
                                <a href="{{fburl}}" target="_blank">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            </li>
                        {{/ fburl}}

                        {{# pinurl}}
                            <li class="smedia-02">
                                <a href="{{pinurl}}" target="_blank">
                                    <!--i class="fa fa-pinterest-square"></i-->
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>

                        {{/ pinurl}}
                        {{# twurl}}
                            <li class="smedia-03">
                                <a href="{{twurl}}" target="_blank">
                                    <i class="fa fa-twitter-square"></i>
                                </a>
                            </li>
                        {{/ twurl}}

                        {{# gpurl}}
                            <li class="smedia-04">
                                <a href="{{gpurl}}" target="_blank">
                                   <!--i class="fa fa-google-plus-square"></i-->
                                   <i class="fa fa-vk"></i>
                                </a>
                            </li>
                        {{/ gpurl}}

                            <li class="smedia-04">
                                <a href="https://www.youtube.com/channel/UCGhplVRA76lCQYVA_VymLHw" target="_blank">
                                   <!--i class="fa fa-google-plus-square"></i-->
                                   <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            {{/ url }}
            </div>
        </div>
    </div>
    <div class="footer-foot">
        <div class="container">
            {{# copyright_footer}}
                <p>{{{copyright_footer}}}</p>
            {{/ copyright_footer}}
        </div>
    </div>

</footer>
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
                
                $buffer .= $indent . '<footer id="footer" class="py-1 bg-inverse">
';
                $buffer .= $indent . '   <div class="footer-main">
';
                $buffer .= $indent . '        <div class="container">
';
                $buffer .= $indent . '            <div class="row">
';
                // 'block1' section
                $value = $context->find('block1');
                $buffer .= $this->section17cbd20e796274fc7aa0bbeb067fdb3c($context, $indent, $value);
                // 'infolink' section
                $value = $context->find('infolink');
                $buffer .= $this->sectionF9e89d057573ffacb9027d38eb382650($context, $indent, $value);
                // 'contact' section
                $value = $context->find('contact');
                $buffer .= $this->section3a5dcdab3438164e55e4559f860b8486($context, $indent, $value);
                // 'url' section
                $value = $context->find('url');
                $buffer .= $this->sectionF334da07a40854c9a5842a91ce08f1eb($context, $indent, $value);
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '        </div>
';
                $buffer .= $indent . '    </div>
';
                $buffer .= $indent . '    <div class="footer-foot">
';
                $buffer .= $indent . '        <div class="container">
';
                // 'copyright_footer' section
                $value = $context->find('copyright_footer');
                $buffer .= $this->section639d4c9d4e74d314e1ce77c5b0a43a42($context, $indent, $value);
                $buffer .= $indent . '        </div>
';
                $buffer .= $indent . '    </div>
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '</footer>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section118dc35aa27e33b5ed6706019f637f46(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
require([\'theme_boost/loader\']);
require([\'theme_boost/drawer\'], function(mod) {
    mod.init();
});
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
                
                $buffer .= $indent . 'require([\'theme_boost/loader\']);
';
                $buffer .= $indent . 'require([\'theme_boost/drawer\'], function(mod) {
';
                $buffer .= $indent . '    mod.init();
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
