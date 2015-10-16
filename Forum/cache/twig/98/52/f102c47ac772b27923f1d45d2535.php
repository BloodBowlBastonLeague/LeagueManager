<?php

/* acp_inactive.html */
class __TwigTemplate_9852f102c47ac772b27923f1d45d2535 extends Twig_Template
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
        echo $this->env->getExtension('phpbb')->lang("INACTIVE_USERS");
        echo "</h1>

<p>";
        // line 7
        echo $this->env->getExtension('phpbb')->lang("INACTIVE_USERS_EXPLAIN");
        echo "</p>

<form id=\"inactive\" method=\"post\" action=\"";
        // line 9
        echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
        echo "\">

";
        // line 11
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination"))) {
            // line 12
            echo "<div class=\"pagination\">
\t";
            // line 13
            $location = "pagination.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->env->loadTemplate("pagination.html")->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 14
            echo "</div>
";
        }
        // line 16
        echo "
<table class=\"table1 zebra-table\">
<thead>
<tr>
\t<th>";
        // line 20
        echo $this->env->getExtension('phpbb')->lang("USERNAME");
        echo "</th>
\t<th>";
        // line 21
        echo $this->env->getExtension('phpbb')->lang("JOINED");
        echo "</th>
\t<th>";
        // line 22
        echo $this->env->getExtension('phpbb')->lang("INACTIVE_DATE");
        echo "</th>
\t<th>";
        // line 23
        echo $this->env->getExtension('phpbb')->lang("LAST_VISIT");
        echo "</th>
\t<th>";
        // line 24
        echo $this->env->getExtension('phpbb')->lang("INACTIVE_REASON");
        echo "</th>
\t<th>";
        // line 25
        echo $this->env->getExtension('phpbb')->lang("MARK");
        echo "</th>
</tr>
</thead>
<tbody>
";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "inactive"));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["inactive"]) {
            // line 30
            echo "\t<tr>
\t\t<td style=\"vertical-align: top;\">
\t\t\t";
            // line 32
            echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "USERNAME_FULL");
            echo "
\t\t\t";
            // line 33
            if ($this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "POSTS")) {
                echo "<br />";
                echo $this->env->getExtension('phpbb')->lang("POSTS");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo " <strong>";
                echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "POSTS");
                echo "</strong> [<a href=\"";
                echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "U_SEARCH_USER");
                echo "\">";
                echo $this->env->getExtension('phpbb')->lang("SEARCH_USER_POSTS");
                echo "</a>]";
            }
            // line 34
            echo "\t\t</td>
\t\t<td style=\"vertical-align: top;\">";
            // line 35
            echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "JOINED");
            echo "</td>
\t\t<td style=\"vertical-align: top;\">";
            // line 36
            echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "INACTIVE_DATE");
            echo "</td>
\t\t<td style=\"vertical-align: top;\">";
            // line 37
            echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "LAST_VISIT");
            echo "</td>
\t\t<td style=\"vertical-align: top;\">
\t\t\t";
            // line 39
            echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "REASON");
            echo "
\t\t\t";
            // line 40
            if ($this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "REMINDED")) {
                echo "<br />";
                echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "REMINDED_EXPLAIN");
            }
            // line 41
            echo "\t\t</td>
\t\t<td>&nbsp;<input type=\"checkbox\" class=\"radio\" name=\"mark[]\" value=\"";
            // line 42
            echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "USER_ID");
            echo "\" />&nbsp;</td>
\t</tr>
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 45
            echo "\t<tr>
\t\t<td colspan=\"6\" style=\"text-align: center;\">";
            // line 46
            echo $this->env->getExtension('phpbb')->lang("NO_INACTIVE_USERS");
            echo "</td>
\t</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['inactive'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "</tbody>
</table>

<fieldset class=\"display-options\">
\t";
        // line 53
        echo $this->env->getExtension('phpbb')->lang("DISPLAY_LOG");
        echo $this->env->getExtension('phpbb')->lang("COLON");
        echo " &nbsp;";
        echo (isset($context["S_LIMIT_DAYS"]) ? $context["S_LIMIT_DAYS"] : null);
        echo "&nbsp;";
        echo $this->env->getExtension('phpbb')->lang("SORT_BY");
        echo $this->env->getExtension('phpbb')->lang("COLON");
        echo " ";
        echo (isset($context["S_SORT_KEY"]) ? $context["S_SORT_KEY"] : null);
        echo " ";
        echo (isset($context["S_SORT_DIR"]) ? $context["S_SORT_DIR"] : null);
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination"))) {
            echo "&nbsp;";
            echo $this->env->getExtension('phpbb')->lang("USERS_PER_PAGE");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " <input class=\"inputbox autowidth\" type=\"number\" name=\"users_per_page\" id=\"users_per_page\" size=\"3\" value=\"";
            echo (isset($context["USERS_PER_PAGE"]) ? $context["USERS_PER_PAGE"] : null);
            echo "\" />";
        }
        // line 54
        echo "\t<input class=\"button2\" type=\"submit\" value=\"";
        echo $this->env->getExtension('phpbb')->lang("GO");
        echo "\" name=\"sort\" />
</fieldset>

<hr />

";
        // line 59
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination"))) {
            // line 60
            echo "\t<div class=\"pagination\">
\t\t";
            // line 61
            $location = "pagination.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->env->loadTemplate("pagination.html")->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 62
            echo "\t</div>
";
        }
        // line 64
        echo "
<fieldset class=\"quick\">
\t<select name=\"action\">";
        // line 66
        echo (isset($context["S_INACTIVE_OPTIONS"]) ? $context["S_INACTIVE_OPTIONS"] : null);
        echo "</select>
\t<input class=\"button2\" type=\"submit\" name=\"submit\" value=\"";
        // line 67
        echo $this->env->getExtension('phpbb')->lang("SUBMIT");
        echo "\" />
\t<p class=\"small\"><a href=\"#\" onclick=\"marklist('inactive', 'mark', true); return false;\">";
        // line 68
        echo $this->env->getExtension('phpbb')->lang("MARK_ALL");
        echo "</a> &bull; <a href=\"#\" onclick=\"marklist('inactive', 'mark', false); return false;\">";
        echo $this->env->getExtension('phpbb')->lang("UNMARK_ALL");
        echo "</a></p>
\t";
        // line 69
        echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
        echo "
</fieldset>

</form>

";
        // line 74
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
        return "acp_inactive.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  261 => 74,  253 => 69,  247 => 68,  243 => 67,  239 => 66,  235 => 64,  231 => 62,  219 => 61,  216 => 60,  214 => 59,  205 => 54,  185 => 53,  179 => 49,  170 => 46,  167 => 45,  159 => 42,  156 => 41,  151 => 40,  147 => 39,  142 => 37,  138 => 36,  134 => 35,  131 => 34,  118 => 33,  114 => 32,  110 => 30,  105 => 29,  98 => 25,  94 => 24,  90 => 23,  86 => 22,  82 => 21,  78 => 20,  72 => 16,  68 => 14,  56 => 13,  53 => 12,  51 => 11,  46 => 9,  41 => 7,  36 => 5,  31 => 2,  19 => 1,);
    }
}
