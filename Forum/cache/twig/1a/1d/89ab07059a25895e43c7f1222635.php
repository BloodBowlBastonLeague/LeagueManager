<?php

/* acp_send_statistics.html */
class __TwigTemplate_1a1d89ab07059a25895e43c7f1222635 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->env->loadTemplate("overall_header.html")->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<a id=\"maincontent\"></a>

<h1>";
        // line 5
        echo $this->env->getExtension('phpbb')->lang("SEND_STATISTICS");
        echo "</h1>

<p>";
        // line 7
        echo $this->env->getExtension('phpbb')->lang("EXPLAIN_SEND_STATISTICS");
        echo "</p>

<script type=\"text/javascript\">
//<![CDATA[
var iframect = 0;

function iframe_updated()
{
\tif (iframect++ == 0)
\t{
\t\treturn;
\t}

\tphpbb.toggleDisplay('questionnaire-form', -1);
\tphpbb.toggleDisplay('questionnaire-thanks', 1);
}
//]]>
</script>

<iframe onload=\"iframe_updated();\" name=\"questionaire_result\" style=\"display: none;\"></iframe>

<form action=\"";
        // line 28
        echo (isset($context["U_COLLECT_STATS"]) ? $context["U_COLLECT_STATS"] : null);
        echo "\" method=\"post\" target=\"questionaire_result\" id=\"questionnaire-form\">

\t<p><a href=\"";
        // line 30
        echo (isset($context["U_ACP_MAIN"]) ? $context["U_ACP_MAIN"] : null);
        echo "\">";
        echo $this->env->getExtension('phpbb')->lang("DONT_SEND_STATISTICS");
        echo "</a></p>

\t<p>";
        // line 32
        echo $this->env->getExtension('phpbb')->lang("EXPLAIN_SHOW_STATISTICS");
        echo "</p>

\t<p id=\"show-button\"><input type=\"button\" class=\"button2\" onclick=\"phpbb.toggleDisplay('configlist', 1); phpbb.toggleDisplay('show-button', -1);\" value=\"";
        // line 34
        echo $this->env->getExtension('phpbb')->lang("SHOW_STATISTICS");
        echo "\" /></p>

\t<div id=\"configlist\">
\t\t<input type=\"button\" class=\"button2\" onclick=\"phpbb.toggleDisplay('show-button', 1); phpbb.toggleDisplay('configlist', -1);\" value=\"";
        // line 37
        echo $this->env->getExtension('phpbb')->lang("HIDE_STATISTICS");
        echo "\" />
\t\t<p class=\"submit-buttons\">
\t\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
        // line 39
        echo $this->env->getExtension('phpbb')->lang("SEND_STATISTICS");
        echo "\" />
\t\t</p>

\t\t";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "providers"));
        foreach ($context['_seq'] as $context["_key"] => $context["providers"]) {
            // line 43
            echo "\t\t<fieldset>
\t\t\t<legend>";
            // line 44
            echo $this->getAttribute((isset($context["providers"]) ? $context["providers"] : null), "NAME");
            echo "</legend>
\t\t\t";
            // line 45
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["providers"]) ? $context["providers"] : null), "values"));
            foreach ($context['_seq'] as $context["_key"] => $context["values"]) {
                // line 46
                echo "\t\t\t<dl>
\t\t\t\t<dt>";
                // line 47
                echo $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "KEY");
                echo "</dt>
\t\t\t\t<dd>";
                // line 48
                echo $this->getAttribute((isset($context["values"]) ? $context["values"] : null), "VALUE");
                echo "</dd>
\t\t\t</dl>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['values'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "\t\t</fieldset>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['providers'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "\t</div>
\t<p class=\"submit-buttons\">
\t\t<input type=\"hidden\" name=\"systemdata\" value=\"";
        // line 55
        echo (isset($context["RAW_DATA"]) ? $context["RAW_DATA"] : null);
        echo "\" />
\t\t<input class=\"button1\" type=\"submit\" id=\"submit\" name=\"submit\" value=\"";
        // line 56
        echo $this->env->getExtension('phpbb')->lang("SEND_STATISTICS");
        echo "\" />
\t</p>
</form>

<div id=\"questionnaire-thanks\" class=\"successbox\">
\t<p><strong>";
        // line 61
        echo $this->env->getExtension('phpbb')->lang("THANKS_SEND_STATISTICS");
        echo "</strong><br /><br /><a href=\"";
        echo (isset($context["U_ACP_MAIN"]) ? $context["U_ACP_MAIN"] : null);
        echo "\">&laquo; ";
        echo $this->env->getExtension('phpbb')->lang("GO_ACP_MAIN");
        echo "</a></p>
</div>

";
        // line 64
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->env->loadTemplate("overall_footer.html")->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "acp_send_statistics.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 64,  153 => 61,  145 => 56,  141 => 55,  137 => 53,  130 => 51,  121 => 48,  117 => 47,  114 => 46,  110 => 45,  106 => 44,  103 => 43,  99 => 42,  93 => 39,  88 => 37,  82 => 34,  77 => 32,  70 => 30,  65 => 28,  41 => 7,  36 => 5,  31 => 2,  19 => 1,);
    }
}
