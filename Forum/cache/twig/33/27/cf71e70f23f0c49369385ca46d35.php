<?php

/* acp_users.html */
class __TwigTemplate_3327cf71e70f23f0c49369385ca46d35 extends Twig_Template
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

";
        // line 5
        if ((isset($context["S_SELECT_USER"]) ? $context["S_SELECT_USER"] : null)) {
            // line 6
            echo "
\t<h1>";
            // line 7
            echo $this->env->getExtension('phpbb')->lang("USER_ADMIN");
            echo "</h1>

\t<p>";
            // line 9
            echo $this->env->getExtension('phpbb')->lang("USER_ADMIN_EXPLAIN");
            echo "</p>

\t<form id=\"select_user\" method=\"post\" action=\"";
            // line 11
            echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
            echo "\">

\t<fieldset>
\t\t<legend>";
            // line 14
            echo $this->env->getExtension('phpbb')->lang("SELECT_USER");
            echo "</legend>
\t<dl>
\t\t<dt><label for=\"username\">";
            // line 16
            echo $this->env->getExtension('phpbb')->lang("ENTER_USERNAME");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t<dd><input class=\"text medium\" type=\"text\" id=\"username\" name=\"username\" /></dd>
\t\t<dd>[ <a href=\"";
            // line 18
            echo (isset($context["U_FIND_USERNAME"]) ? $context["U_FIND_USERNAME"] : null);
            echo "\" onclick=\"find_username(this.href); return false;\">";
            echo $this->env->getExtension('phpbb')->lang("FIND_USERNAME");
            echo "</a> ]</dd>
\t\t<dd class=\"full\" style=\"text-align: left;\"><label><input type=\"checkbox\" class=\"radio\" id=\"anonymous\" name=\"u\" value=\"";
            // line 19
            echo (isset($context["ANONYMOUS_USER_ID"]) ? $context["ANONYMOUS_USER_ID"] : null);
            echo "\" /> ";
            echo $this->env->getExtension('phpbb')->lang("SELECT_ANONYMOUS");
            echo "</label></dd>
\t</dl>

\t<p class=\"quick\">
\t\t<input type=\"submit\" name=\"submituser\" value=\"";
            // line 23
            echo $this->env->getExtension('phpbb')->lang("SUBMIT");
            echo "\" class=\"button1\" />
\t</p>
\t</fieldset>

\t</form>

";
        } elseif ((isset($context["S_SELECT_FORUM"]) ? $context["S_SELECT_FORUM"] : null)) {
            // line 30
            echo "
\t<a href=\"";
            // line 31
            echo (isset($context["U_BACK"]) ? $context["U_BACK"] : null);
            echo "\" style=\"float: ";
            echo (isset($context["S_CONTENT_FLOW_END"]) ? $context["S_CONTENT_FLOW_END"] : null);
            echo ";\">&laquo; ";
            echo $this->env->getExtension('phpbb')->lang("BACK");
            echo "</a>

\t<h1>";
            // line 33
            echo $this->env->getExtension('phpbb')->lang("USER_ADMIN");
            echo "</h1>

\t<p>";
            // line 35
            echo $this->env->getExtension('phpbb')->lang("USER_ADMIN_EXPLAIN");
            echo "</p>

\t<form id=\"select_forum\" method=\"post\" action=\"";
            // line 37
            echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
            echo "\">

\t<fieldset>
\t\t<legend>";
            // line 40
            echo $this->env->getExtension('phpbb')->lang("USER_ADMIN_MOVE_POSTS");
            echo "</legend>
\t<dl>
\t\t<dt><label for=\"new_forum\">";
            // line 42
            echo $this->env->getExtension('phpbb')->lang("USER_ADMIN_MOVE_POSTS");
            echo "</label><br /><span>";
            echo $this->env->getExtension('phpbb')->lang("MOVE_POSTS_EXPLAIN");
            echo "</span></dt>
\t\t<dd><select id=\"new_forum\" name=\"new_f\">";
            // line 43
            echo (isset($context["S_FORUM_OPTIONS"]) ? $context["S_FORUM_OPTIONS"] : null);
            echo "</select></dd>
\t</dl>
\t</fieldset>

\t<fieldset class=\"quick\">
\t\t<input type=\"submit\" name=\"update\" value=\"";
            // line 48
            echo $this->env->getExtension('phpbb')->lang("SUBMIT");
            echo "\" class=\"button1\" />
\t\t";
            // line 49
            echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
            echo "
\t</fieldset>
\t</form>

";
        } else {
            // line 54
            echo "
\t<a href=\"";
            // line 55
            echo (isset($context["U_BACK"]) ? $context["U_BACK"] : null);
            echo "\" style=\"float: ";
            echo (isset($context["S_CONTENT_FLOW_END"]) ? $context["S_CONTENT_FLOW_END"] : null);
            echo ";\">&laquo; ";
            echo $this->env->getExtension('phpbb')->lang("BACK");
            echo "</a>

\t<h1>";
            // line 57
            echo $this->env->getExtension('phpbb')->lang("USER_ADMIN");
            echo " :: ";
            echo (isset($context["MANAGED_USERNAME"]) ? $context["MANAGED_USERNAME"] : null);
            echo "</h1>

\t<p>";
            // line 59
            echo $this->env->getExtension('phpbb')->lang("USER_ADMIN_EXPLAIN");
            echo "</p>

\t";
            // line 61
            if ((isset($context["S_ERROR"]) ? $context["S_ERROR"] : null)) {
                // line 62
                echo "\t\t<div class=\"errorbox\">
\t\t\t<h3>";
                // line 63
                echo $this->env->getExtension('phpbb')->lang("WARNING");
                echo "</h3>
\t\t\t<p>";
                // line 64
                echo (isset($context["ERROR_MSG"]) ? $context["ERROR_MSG"] : null);
                echo "</p>
\t\t</div>
\t";
            }
            // line 67
            echo "
\t<form id=\"mode_select\" method=\"post\" action=\"";
            // line 68
            echo (isset($context["U_MODE_SELECT"]) ? $context["U_MODE_SELECT"] : null);
            echo "\">

\t<fieldset class=\"quick\">
\t\t";
            // line 71
            echo $this->env->getExtension('phpbb')->lang("SELECT_FORM");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " <select name=\"mode\" onchange=\"if (this.options[this.selectedIndex].value != '') this.form.submit();\">";
            echo (isset($context["S_FORM_OPTIONS"]) ? $context["S_FORM_OPTIONS"] : null);
            echo "</select> <input class=\"button2\" type=\"submit\" value=\"";
            echo $this->env->getExtension('phpbb')->lang("GO");
            echo "\" />
\t\t";
            // line 72
            echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
            echo "
\t</fieldset>
\t</form>

";
        }
        // line 77
        echo "
";
        // line 78
        if ((isset($context["S_OVERVIEW"]) ? $context["S_OVERVIEW"] : null)) {
            // line 79
            echo "
";
            // line 80
            $location = "acp_users_overview.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->env->loadTemplate("acp_users_overview.html")->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 81
            echo "
";
        } elseif ((isset($context["S_FEEDBACK"]) ? $context["S_FEEDBACK"] : null)) {
            // line 83
            echo "
";
            // line 84
            $location = "acp_users_feedback.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->env->loadTemplate("acp_users_feedback.html")->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 85
            echo "
";
        } elseif ((isset($context["S_WARNINGS"]) ? $context["S_WARNINGS"] : null)) {
            // line 87
            echo "
";
            // line 88
            $location = "acp_users_warnings.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->env->loadTemplate("acp_users_warnings.html")->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 89
            echo "
";
        } elseif ((isset($context["S_PROFILE"]) ? $context["S_PROFILE"] : null)) {
            // line 91
            echo "
";
            // line 92
            $location = "acp_users_profile.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->env->loadTemplate("acp_users_profile.html")->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 93
            echo "
";
        } elseif ((isset($context["S_PREFS"]) ? $context["S_PREFS"] : null)) {
            // line 95
            echo "
";
            // line 96
            $location = "acp_users_prefs.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->env->loadTemplate("acp_users_prefs.html")->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 97
            echo "
";
        } elseif ((isset($context["S_AVATAR"]) ? $context["S_AVATAR"] : null)) {
            // line 99
            echo "
";
            // line 100
            $location = "acp_users_avatar.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->env->loadTemplate("acp_users_avatar.html")->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 101
            echo "
";
        } elseif ((isset($context["S_RANK"]) ? $context["S_RANK"] : null)) {
            // line 103
            echo "
\t<form id=\"user_prefs\" method=\"post\" action=\"";
            // line 104
            echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
            echo "\">

\t<fieldset>
\t\t<legend>";
            // line 107
            echo $this->env->getExtension('phpbb')->lang("ACP_USER_RANK");
            echo "</legend>
\t<dl>
\t\t<dt><label for=\"user_rank\">";
            // line 109
            echo $this->env->getExtension('phpbb')->lang("USER_RANK");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo "</label></dt>
\t\t<dd><select name=\"user_rank\" id=\"user_rank\">";
            // line 110
            echo (isset($context["S_RANK_OPTIONS"]) ? $context["S_RANK_OPTIONS"] : null);
            echo "</select></dd>
\t</dl>
\t</fieldset>

\t<fieldset class=\"quick\">
\t\t<input class=\"button1\" type=\"submit\" name=\"update\" value=\"";
            // line 115
            echo $this->env->getExtension('phpbb')->lang("SUBMIT");
            echo "\" />
\t\t";
            // line 116
            echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
            echo "
\t</fieldset>
\t</form>

";
        } elseif ((isset($context["S_SIGNATURE"]) ? $context["S_SIGNATURE"] : null)) {
            // line 121
            echo "
";
            // line 122
            $location = "acp_users_signature.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->env->loadTemplate("acp_users_signature.html")->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 123
            echo "
";
        } elseif ((isset($context["S_GROUPS"]) ? $context["S_GROUPS"] : null)) {
            // line 125
            echo "
\t<form id=\"user_groups\" method=\"post\" action=\"";
            // line 126
            echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
            echo "\">

\t<table class=\"table1 zebra-table\">
\t<tbody>
\t";
            // line 130
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "group"));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 131
                echo "\t\t";
                if ($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "S_NEW_GROUP_TYPE")) {
                    // line 132
                    echo "\t\t<tr>
\t\t\t<td class=\"row3\" colspan=\"4\"><strong>";
                    // line 133
                    echo $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "GROUP_TYPE");
                    echo "</strong></td>
\t\t</tr>
\t\t";
                } else {
                    // line 136
                    echo "\t\t\t<tr>
\t\t\t\t<td><a href=\"";
                    // line 137
                    echo $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "U_EDIT_GROUP");
                    echo "\">";
                    echo $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "GROUP_NAME");
                    echo "</a></td>
\t\t\t\t<td>";
                    // line 138
                    if ($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "S_IS_MEMBER")) {
                        if ($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "S_NO_DEFAULT")) {
                            echo "<a href=\"";
                            echo $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "U_DEFAULT");
                            echo "\">";
                            echo $this->env->getExtension('phpbb')->lang("GROUP_DEFAULT");
                            echo "</a>";
                        } else {
                            echo "<strong>";
                            echo $this->env->getExtension('phpbb')->lang("GROUP_DEFAULT");
                            echo "</strong>";
                        }
                    } elseif (((!$this->getAttribute((isset($context["group"]) ? $context["group"] : null), "S_IS_MEMBER")) && $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "U_APPROVE"))) {
                        echo "<a href=\"";
                        echo $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "U_APPROVE");
                        echo "\">";
                        echo $this->env->getExtension('phpbb')->lang("GROUP_APPROVE");
                        echo "</a>";
                    } else {
                        echo "&nbsp;";
                    }
                    echo "</td>
\t\t\t\t<td>";
                    // line 139
                    if (($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "S_IS_MEMBER") && (!$this->getAttribute((isset($context["group"]) ? $context["group"] : null), "S_SPECIAL_GROUP")))) {
                        echo "<a href=\"";
                        echo $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "U_DEMOTE_PROMOTE");
                        echo "\">";
                        echo $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "L_DEMOTE_PROMOTE");
                        echo "</a>";
                    } else {
                        echo "&nbsp;";
                    }
                    echo "</td>
\t\t\t\t<td><a href=\"";
                    // line 140
                    echo $this->getAttribute((isset($context["group"]) ? $context["group"] : null), "U_DELETE");
                    echo "\">";
                    echo $this->env->getExtension('phpbb')->lang("GROUP_DELETE");
                    echo "</a></td>
\t\t\t</tr>
\t\t";
                }
                // line 143
                echo "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 144
            echo "\t</tbody>
\t</table>

\t";
            // line 147
            if ((isset($context["S_GROUP_OPTIONS"]) ? $context["S_GROUP_OPTIONS"] : null)) {
                // line 148
                echo "\t\t<fieldset class=\"quick\">
\t\t\t";
                // line 149
                echo $this->env->getExtension('phpbb')->lang("USER_GROUP_ADD");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo " <select name=\"g\">";
                echo (isset($context["S_GROUP_OPTIONS"]) ? $context["S_GROUP_OPTIONS"] : null);
                echo "</select> <input class=\"button1\" type=\"submit\" name=\"update\" value=\"";
                echo $this->env->getExtension('phpbb')->lang("SUBMIT");
                echo "\" />
\t\t\t";
                // line 150
                echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
                echo "
\t\t</fieldset>
\t";
            }
            // line 153
            echo "\t</form>

";
        } elseif ((isset($context["S_ATTACHMENTS"]) ? $context["S_ATTACHMENTS"] : null)) {
            // line 156
            echo "
\t<form id=\"user_attachments\" method=\"post\" action=\"";
            // line 157
            echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
            echo "\">


\t<div class=\"pagination\">
\t";
            // line 161
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination"))) {
                // line 162
                echo "\t\t";
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
                // line 163
                echo "\t";
            }
            // line 164
            echo "\t</div>

\t";
            // line 166
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "attach"))) {
                // line 167
                echo "\t<table class=\"table1 zebra-table fixed-width-table\">
\t<thead>
\t<tr>
\t\t<th>";
                // line 170
                echo $this->env->getExtension('phpbb')->lang("FILENAME");
                echo "</th>
\t\t<th style=\"width: 20%;\">";
                // line 171
                echo $this->env->getExtension('phpbb')->lang("POST_TIME");
                echo "</th>
\t\t<th style=\"width: 20%;\">";
                // line 172
                echo $this->env->getExtension('phpbb')->lang("FILESIZE");
                echo "</th>
\t\t<th style=\"width: 20%;\">";
                // line 173
                echo $this->env->getExtension('phpbb')->lang("DOWNLOADS");
                echo "</th>
\t\t<th style=\"width: 50px;\">";
                // line 174
                echo $this->env->getExtension('phpbb')->lang("MARK");
                echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t";
                // line 178
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "attach"));
                foreach ($context['_seq'] as $context["_key"] => $context["attach"]) {
                    // line 179
                    echo "\t<tr>
\t\t<td><a href=\"";
                    // line 180
                    echo $this->getAttribute((isset($context["attach"]) ? $context["attach"] : null), "U_DOWNLOAD");
                    echo "\">";
                    echo $this->getAttribute((isset($context["attach"]) ? $context["attach"] : null), "REAL_FILENAME");
                    echo "</a><br /><span class=\"small\">";
                    if ($this->getAttribute((isset($context["attach"]) ? $context["attach"] : null), "S_IN_MESSAGE")) {
                        echo "<strong>";
                        echo $this->env->getExtension('phpbb')->lang("PM");
                        echo $this->env->getExtension('phpbb')->lang("COLON");
                        echo " </strong>";
                    } else {
                        echo "<strong>";
                        echo $this->env->getExtension('phpbb')->lang("POST");
                        echo $this->env->getExtension('phpbb')->lang("COLON");
                        echo " </strong>";
                    }
                    echo "<a href=\"";
                    echo $this->getAttribute((isset($context["attach"]) ? $context["attach"] : null), "U_VIEW_TOPIC");
                    echo "\">";
                    echo $this->getAttribute((isset($context["attach"]) ? $context["attach"] : null), "TOPIC_TITLE");
                    echo "</a></span></td>
\t\t<td style=\"text-align: center\">";
                    // line 181
                    echo $this->getAttribute((isset($context["attach"]) ? $context["attach"] : null), "POST_TIME");
                    echo "</td>
\t\t<td style=\"text-align: center\">";
                    // line 182
                    echo $this->getAttribute((isset($context["attach"]) ? $context["attach"] : null), "SIZE");
                    echo "</td>
\t\t<td style=\"text-align: center\">";
                    // line 183
                    echo $this->getAttribute((isset($context["attach"]) ? $context["attach"] : null), "DOWNLOAD_COUNT");
                    echo "</td>
\t\t<td style=\"text-align: center\"><input type=\"checkbox\" class=\"radio\" name=\"mark[]\" value=\"";
                    // line 184
                    echo $this->getAttribute((isset($context["attach"]) ? $context["attach"] : null), "ATTACH_ID");
                    echo "\" /></td>
\t</tr>
\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attach'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 187
                echo "\t</tbody>
\t</table>
\t";
            } else {
                // line 190
                echo "\t<div class=\"errorbox\">
\t\t<p>";
                // line 191
                echo $this->env->getExtension('phpbb')->lang("USER_NO_ATTACHMENTS");
                echo "</p>
\t</div>
\t";
            }
            // line 194
            echo "\t<fieldset class=\"display-options\">
\t\t";
            // line 195
            echo $this->env->getExtension('phpbb')->lang("SORT_BY");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " <select name=\"sk\">";
            echo (isset($context["S_SORT_KEY"]) ? $context["S_SORT_KEY"] : null);
            echo "</select> <select name=\"sd\">";
            echo (isset($context["S_SORT_DIR"]) ? $context["S_SORT_DIR"] : null);
            echo "</select>
\t\t<input class=\"button2\" type=\"submit\" value=\"";
            // line 196
            echo $this->env->getExtension('phpbb')->lang("GO");
            echo "\" name=\"sort\" />
\t</fieldset>
\t<hr />
\t<div class=\"pagination\">
\t";
            // line 200
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "pagination"))) {
                // line 201
                echo "\t\t";
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
                // line 202
                echo "\t";
            }
            // line 203
            echo "\t</div>

\t<fieldset class=\"quick\">
\t\t<input class=\"button2\" type=\"submit\" name=\"delmarked\" value=\"";
            // line 206
            echo $this->env->getExtension('phpbb')->lang("DELETE_MARKED");
            echo "\" />
\t\t<p class=\"small\"><a href=\"#\" onclick=\"marklist('user_attachments', 'mark', true);\">";
            // line 207
            echo $this->env->getExtension('phpbb')->lang("MARK_ALL");
            echo "</a> &bull; <a href=\"#\" onclick=\"marklist('user_attachments', 'mark', false);\">";
            echo $this->env->getExtension('phpbb')->lang("UNMARK_ALL");
            echo "</a></p>
\t\t";
            // line 208
            echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
            echo "
\t</fieldset>
\t</form>

";
        } elseif ((isset($context["S_PERMISSIONS"]) ? $context["S_PERMISSIONS"] : null)) {
            // line 213
            echo "
\t<div style=\"float: ";
            // line 214
            echo (isset($context["S_CONTENT_FLOW_END"]) ? $context["S_CONTENT_FLOW_END"] : null);
            echo ";\">
\t\t<a href=\"";
            // line 215
            echo (isset($context["U_USER_PERMISSIONS"]) ? $context["U_USER_PERMISSIONS"] : null);
            echo "\">&raquo; ";
            echo $this->env->getExtension('phpbb')->lang("SET_USERS_PERMISSIONS");
            echo "</a><br />
\t\t<a href=\"";
            // line 216
            echo (isset($context["U_USER_FORUM_PERMISSIONS"]) ? $context["U_USER_FORUM_PERMISSIONS"] : null);
            echo "\">&raquo; ";
            echo $this->env->getExtension('phpbb')->lang("SET_USERS_FORUM_PERMISSIONS");
            echo "</a>
\t</div>

\t<form id=\"select_forum\" method=\"post\" action=\"";
            // line 219
            echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
            echo "\">

\t\t<fieldset class=\"quick\" style=\"text-align: left;\">
\t\t\t";
            // line 222
            echo $this->env->getExtension('phpbb')->lang("SELECT_FORUM");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " <select name=\"f\">";
            echo (isset($context["S_FORUM_OPTIONS"]) ? $context["S_FORUM_OPTIONS"] : null);
            echo "</select>
\t\t\t<input class=\"button2\" type=\"submit\" value=\"";
            // line 223
            echo $this->env->getExtension('phpbb')->lang("GO");
            echo "\" name=\"select\" />
\t\t\t";
            // line 224
            echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
            echo "
\t\t</fieldset>
\t</form>

\t<div class=\"clearfix\">&nbsp;</div>

\t";
            // line 230
            $location = "permission_mask.html";
            $namespace = false;
            if (strpos($location, '@') === 0) {
                $namespace = substr($location, 1, strpos($location, '/') - 1);
                $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
                $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
            }
            $this->env->loadTemplate("permission_mask.html")->display($context);
            if ($namespace) {
                $this->env->setNamespaceLookUpOrder($previous_look_up_order);
            }
            // line 231
            echo "
";
        }
        // line 233
        echo "
";
        // line 234
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
        return "acp_users.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  761 => 234,  758 => 233,  754 => 231,  742 => 230,  733 => 224,  729 => 223,  722 => 222,  716 => 219,  708 => 216,  702 => 215,  698 => 214,  695 => 213,  687 => 208,  681 => 207,  677 => 206,  672 => 203,  669 => 202,  656 => 201,  654 => 200,  647 => 196,  638 => 195,  635 => 194,  629 => 191,  626 => 190,  621 => 187,  612 => 184,  608 => 183,  604 => 182,  600 => 181,  578 => 180,  575 => 179,  571 => 178,  564 => 174,  560 => 173,  556 => 172,  552 => 171,  548 => 170,  543 => 167,  541 => 166,  537 => 164,  534 => 163,  521 => 162,  519 => 161,  512 => 157,  509 => 156,  504 => 153,  498 => 150,  489 => 149,  486 => 148,  484 => 147,  479 => 144,  473 => 143,  465 => 140,  453 => 139,  429 => 138,  423 => 137,  420 => 136,  414 => 133,  411 => 132,  408 => 131,  404 => 130,  397 => 126,  394 => 125,  390 => 123,  378 => 122,  375 => 121,  367 => 116,  363 => 115,  355 => 110,  350 => 109,  345 => 107,  339 => 104,  336 => 103,  332 => 101,  320 => 100,  317 => 99,  313 => 97,  301 => 96,  298 => 95,  294 => 93,  282 => 92,  279 => 91,  275 => 89,  263 => 88,  260 => 87,  256 => 85,  244 => 84,  241 => 83,  237 => 81,  225 => 80,  222 => 79,  220 => 78,  217 => 77,  209 => 72,  200 => 71,  194 => 68,  191 => 67,  185 => 64,  181 => 63,  178 => 62,  176 => 61,  171 => 59,  164 => 57,  155 => 55,  152 => 54,  144 => 49,  140 => 48,  132 => 43,  126 => 42,  121 => 40,  115 => 37,  110 => 35,  105 => 33,  96 => 31,  93 => 30,  83 => 23,  74 => 19,  68 => 18,  62 => 16,  57 => 14,  51 => 11,  46 => 9,  41 => 7,  38 => 6,  36 => 5,  31 => 2,  19 => 1,);
    }
}
