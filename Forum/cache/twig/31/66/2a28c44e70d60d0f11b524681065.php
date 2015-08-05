<?php

/* acp_main.html */
class __TwigTemplate_31662a28c44e70d60d0f11b524681065 extends Twig_Template
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
        if ((isset($context["S_RESTORE_PERMISSIONS"]) ? $context["S_RESTORE_PERMISSIONS"] : null)) {
            // line 6
            echo "
\t<h1>";
            // line 7
            echo $this->env->getExtension('phpbb')->lang("PERMISSIONS_TRANSFERRED");
            echo "</h1>

\t<p>";
            // line 9
            echo $this->env->getExtension('phpbb')->lang("PERMISSIONS_TRANSFERRED_EXPLAIN");
            echo "</p>

";
        } else {
            // line 12
            echo "
\t<h1>";
            // line 13
            echo $this->env->getExtension('phpbb')->lang("WELCOME_PHPBB");
            echo "</h1>

\t<p>";
            // line 15
            echo $this->env->getExtension('phpbb')->lang("ADMIN_INTRO");
            echo "</p>

\t";
            // line 17
            if ((isset($context["S_VERSIONCHECK_FAIL"]) ? $context["S_VERSIONCHECK_FAIL"] : null)) {
                // line 18
                echo "\t\t<div class=\"errorbox notice\">
\t\t\t<p>";
                // line 19
                echo $this->env->getExtension('phpbb')->lang("VERSIONCHECK_FAIL");
                echo "</p>
\t\t\t<p>";
                // line 20
                echo (isset($context["VERSIONCHECK_FAIL_REASON"]) ? $context["VERSIONCHECK_FAIL_REASON"] : null);
                echo "</p>
\t\t\t<p><a href=\"";
                // line 21
                echo (isset($context["U_VERSIONCHECK_FORCE"]) ? $context["U_VERSIONCHECK_FORCE"] : null);
                echo "\">";
                echo $this->env->getExtension('phpbb')->lang("VERSIONCHECK_FORCE_UPDATE");
                echo "</a> &middot; <a href=\"";
                echo (isset($context["U_VERSIONCHECK"]) ? $context["U_VERSIONCHECK"] : null);
                echo "\">";
                echo $this->env->getExtension('phpbb')->lang("MORE_INFORMATION");
                echo "</a></p>
\t\t</div>
\t";
            } elseif ((!(isset($context["S_VERSION_UP_TO_DATE"]) ? $context["S_VERSION_UP_TO_DATE"] : null))) {
                // line 24
                echo "\t\t<div class=\"errorbox\">
\t\t\t<p>";
                // line 25
                echo $this->env->getExtension('phpbb')->lang("VERSION_NOT_UP_TO_DATE_TITLE");
                echo "</p>
\t\t\t<p><a href=\"";
                // line 26
                echo (isset($context["U_VERSIONCHECK_FORCE"]) ? $context["U_VERSIONCHECK_FORCE"] : null);
                echo "\">";
                echo $this->env->getExtension('phpbb')->lang("VERSIONCHECK_FORCE_UPDATE");
                echo "</a> &middot; <a href=\"";
                echo (isset($context["U_VERSIONCHECK"]) ? $context["U_VERSIONCHECK"] : null);
                echo "\">";
                echo $this->env->getExtension('phpbb')->lang("MORE_INFORMATION");
                echo "</a></p>
\t\t</div>
\t";
            }
            // line 29
            echo "
\t";
            // line 30
            if ((isset($context["S_SEARCH_INDEX_MISSING"]) ? $context["S_SEARCH_INDEX_MISSING"] : null)) {
                // line 31
                echo "\t\t<div class=\"errorbox\">
\t\t\t<h3>";
                // line 32
                echo $this->env->getExtension('phpbb')->lang("WARNING");
                echo "</h3>
\t\t\t<p>";
                // line 33
                echo $this->env->getExtension('phpbb')->lang("NO_SEARCH_INDEX");
                echo "</p>
\t\t</div>
\t";
            }
            // line 36
            echo "
\t";
            // line 37
            if ((isset($context["S_REMOVE_INSTALL"]) ? $context["S_REMOVE_INSTALL"] : null)) {
                // line 38
                echo "\t\t<div class=\"errorbox\">
\t\t\t<h3>";
                // line 39
                echo $this->env->getExtension('phpbb')->lang("WARNING");
                echo "</h3>
\t\t\t<p>";
                // line 40
                echo $this->env->getExtension('phpbb')->lang("REMOVE_INSTALL");
                echo "</p>
\t\t</div>
\t";
            }
            // line 43
            echo "
\t";
            // line 44
            if ((isset($context["S_MBSTRING_LOADED"]) ? $context["S_MBSTRING_LOADED"] : null)) {
                // line 45
                echo "\t\t";
                if ((isset($context["S_MBSTRING_FUNC_OVERLOAD_FAIL"]) ? $context["S_MBSTRING_FUNC_OVERLOAD_FAIL"] : null)) {
                    // line 46
                    echo "\t\t\t<div class=\"errorbox\">
\t\t\t\t<h3>";
                    // line 47
                    echo $this->env->getExtension('phpbb')->lang("ERROR_MBSTRING_FUNC_OVERLOAD");
                    echo "</h3>
\t\t\t\t<p>";
                    // line 48
                    echo $this->env->getExtension('phpbb')->lang("ERROR_MBSTRING_FUNC_OVERLOAD_EXPLAIN");
                    echo "</p>
\t\t\t</div>
\t\t";
                }
                // line 51
                echo "
\t\t";
                // line 52
                if ((isset($context["S_MBSTRING_ENCODING_TRANSLATION_FAIL"]) ? $context["S_MBSTRING_ENCODING_TRANSLATION_FAIL"] : null)) {
                    // line 53
                    echo "\t\t\t<div class=\"errorbox\">
\t\t\t\t<h3>";
                    // line 54
                    echo $this->env->getExtension('phpbb')->lang("ERROR_MBSTRING_ENCODING_TRANSLATION");
                    echo "</h3>
\t\t\t\t<p>";
                    // line 55
                    echo $this->env->getExtension('phpbb')->lang("ERROR_MBSTRING_ENCODING_TRANSLATION_EXPLAIN");
                    echo "</p>
\t\t\t</div>
\t\t";
                }
                // line 58
                echo "
\t\t";
                // line 59
                if ((isset($context["S_MBSTRING_HTTP_INPUT_FAIL"]) ? $context["S_MBSTRING_HTTP_INPUT_FAIL"] : null)) {
                    // line 60
                    echo "\t\t\t<div class=\"errorbox\">
\t\t\t\t<h3>";
                    // line 61
                    echo $this->env->getExtension('phpbb')->lang("ERROR_MBSTRING_HTTP_INPUT");
                    echo "</h3>
\t\t\t\t<p>";
                    // line 62
                    echo $this->env->getExtension('phpbb')->lang("ERROR_MBSTRING_HTTP_INPUT_EXPLAIN");
                    echo "</p>
\t\t\t</div>
\t\t";
                }
                // line 65
                echo "
\t\t";
                // line 66
                if ((isset($context["S_MBSTRING_HTTP_OUTPUT_FAIL"]) ? $context["S_MBSTRING_HTTP_OUTPUT_FAIL"] : null)) {
                    // line 67
                    echo "\t\t\t<div class=\"errorbox\">
\t\t\t\t<h3>";
                    // line 68
                    echo $this->env->getExtension('phpbb')->lang("ERROR_MBSTRING_HTTP_OUTPUT");
                    echo "</h3>
\t\t\t\t<p>";
                    // line 69
                    echo $this->env->getExtension('phpbb')->lang("ERROR_MBSTRING_HTTP_OUTPUT_EXPLAIN");
                    echo "</p>
\t\t\t</div>
\t\t";
                }
                // line 72
                echo "\t";
            }
            // line 73
            echo "
\t";
            // line 74
            if ((isset($context["S_WRITABLE_CONFIG"]) ? $context["S_WRITABLE_CONFIG"] : null)) {
                // line 75
                echo "\t\t<div class=\"errorbox notice\">
\t\t\t<p>";
                // line 76
                echo $this->env->getExtension('phpbb')->lang("WRITABLE_CONFIG");
                echo "</p>
\t\t</div>
\t";
            }
            // line 79
            echo "
\t";
            // line 80
            if ((isset($context["S_PHP_VERSION_OLD"]) ? $context["S_PHP_VERSION_OLD"] : null)) {
                // line 81
                echo "\t\t<div class=\"errorbox notice\">
\t\t\t<p>";
                // line 82
                echo $this->env->getExtension('phpbb')->lang("PHP_VERSION_OLD");
                echo "</p>
\t\t</div>
\t";
            }
            // line 85
            echo "
\t";
            // line 86
            // line 87
            echo "
\t<table class=\"table1 two-columns no-header\" data-no-responsive-header=\"true\">
\t\t<caption>";
            // line 89
            echo $this->env->getExtension('phpbb')->lang("FORUM_STATS");
            echo "</caption>
\t\t<col class=\"col1\" /><col class=\"col2\" /><col class=\"col1\" /><col class=\"col2\" />
\t<thead>
\t<tr>
\t\t<th>";
            // line 93
            echo $this->env->getExtension('phpbb')->lang("STATISTIC");
            echo "</th>
\t\t<th>";
            // line 94
            echo $this->env->getExtension('phpbb')->lang("VALUE");
            echo "</th>
\t\t<th>";
            // line 95
            echo $this->env->getExtension('phpbb')->lang("STATISTIC");
            echo "</th>
\t\t<th>";
            // line 96
            echo $this->env->getExtension('phpbb')->lang("VALUE");
            echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t<tr>
\t\t<td>";
            // line 101
            echo $this->env->getExtension('phpbb')->lang("NUMBER_POSTS");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 102
            echo (isset($context["TOTAL_POSTS"]) ? $context["TOTAL_POSTS"] : null);
            echo "</strong></td>
\t\t<td>";
            // line 103
            echo $this->env->getExtension('phpbb')->lang("POSTS_PER_DAY");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 104
            echo (isset($context["POSTS_PER_DAY"]) ? $context["POSTS_PER_DAY"] : null);
            echo "</strong></td>
\t</tr>
\t<tr>
\t\t<td>";
            // line 107
            echo $this->env->getExtension('phpbb')->lang("NUMBER_TOPICS");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 108
            echo (isset($context["TOTAL_TOPICS"]) ? $context["TOTAL_TOPICS"] : null);
            echo "</strong></td>
\t\t<td>";
            // line 109
            echo $this->env->getExtension('phpbb')->lang("TOPICS_PER_DAY");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 110
            echo (isset($context["TOPICS_PER_DAY"]) ? $context["TOPICS_PER_DAY"] : null);
            echo "</strong></td>
\t</tr>
\t<tr>
\t\t<td>";
            // line 113
            echo $this->env->getExtension('phpbb')->lang("NUMBER_USERS");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 114
            echo (isset($context["TOTAL_USERS"]) ? $context["TOTAL_USERS"] : null);
            echo "</strong></td>
\t\t<td>";
            // line 115
            echo $this->env->getExtension('phpbb')->lang("USERS_PER_DAY");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 116
            echo (isset($context["USERS_PER_DAY"]) ? $context["USERS_PER_DAY"] : null);
            echo "</strong></td>
\t</tr>
\t<tr>
\t\t<td>";
            // line 119
            echo $this->env->getExtension('phpbb')->lang("NUMBER_FILES");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 120
            echo (isset($context["TOTAL_FILES"]) ? $context["TOTAL_FILES"] : null);
            echo "</strong></td>
\t\t<td>";
            // line 121
            echo $this->env->getExtension('phpbb')->lang("FILES_PER_DAY");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 122
            echo (isset($context["FILES_PER_DAY"]) ? $context["FILES_PER_DAY"] : null);
            echo "</strong></td>
\t</tr>


\t<tr>
\t\t<td>";
            // line 127
            echo $this->env->getExtension('phpbb')->lang("BOARD_STARTED");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 128
            echo (isset($context["START_DATE"]) ? $context["START_DATE"] : null);
            echo "</strong></td>
\t\t<td>";
            // line 129
            echo $this->env->getExtension('phpbb')->lang("AVATAR_DIR_SIZE");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 130
            echo (isset($context["AVATAR_DIR_SIZE"]) ? $context["AVATAR_DIR_SIZE"] : null);
            echo "</strong></td>
\t</tr>
\t<tr>
\t\t<td>";
            // line 133
            echo $this->env->getExtension('phpbb')->lang("DATABASE_SIZE");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 134
            echo (isset($context["DBSIZE"]) ? $context["DBSIZE"] : null);
            echo "</strong></td>
\t\t<td>";
            // line 135
            echo $this->env->getExtension('phpbb')->lang("UPLOAD_DIR_SIZE");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 136
            echo (isset($context["UPLOAD_DIR_SIZE"]) ? $context["UPLOAD_DIR_SIZE"] : null);
            echo "</strong></td>
\t</tr>
\t<tr>
\t\t<td>";
            // line 139
            echo $this->env->getExtension('phpbb')->lang("DATABASE_SERVER_INFO");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 140
            echo (isset($context["DATABASE_INFO"]) ? $context["DATABASE_INFO"] : null);
            echo "</strong></td>
\t\t<td>";
            // line 141
            echo $this->env->getExtension('phpbb')->lang("GZIP_COMPRESSION");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td><strong>";
            // line 142
            echo (isset($context["GZIP_COMPRESSION"]) ? $context["GZIP_COMPRESSION"] : null);
            echo "</strong></td>
\t</tr>
\t<tr>
\t\t<td>";
            // line 145
            echo $this->env->getExtension('phpbb')->lang("BOARD_VERSION");
            echo $this->env->getExtension('phpbb')->lang("COLON");
            echo " </td>
\t\t<td>
\t\t\t<strong><a href=\"";
            // line 147
            echo (isset($context["U_VERSIONCHECK"]) ? $context["U_VERSIONCHECK"] : null);
            echo "\" ";
            if ((isset($context["S_VERSION_UP_TO_DATE"]) ? $context["S_VERSION_UP_TO_DATE"] : null)) {
                echo "style=\"color: #228822;\"";
            } else {
                echo "style=\"color: #BC2A4D;\"";
            }
            echo " title=\"";
            echo $this->env->getExtension('phpbb')->lang("MORE_INFORMATION");
            echo "\">";
            echo (isset($context["BOARD_VERSION"]) ? $context["BOARD_VERSION"] : null);
            echo "</a></strong> [&nbsp;<a href=\"";
            echo (isset($context["U_VERSIONCHECK_FORCE"]) ? $context["U_VERSIONCHECK_FORCE"] : null);
            echo "\">";
            echo $this->env->getExtension('phpbb')->lang("VERSIONCHECK_FORCE_UPDATE");
            echo "</a>&nbsp;]
\t\t</td>
\t";
            // line 149
            if ((isset($context["S_TOTAL_ORPHAN"]) ? $context["S_TOTAL_ORPHAN"] : null)) {
                // line 150
                echo "\t\t<td>";
                echo $this->env->getExtension('phpbb')->lang("NUMBER_ORPHAN");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo " </td>
\t\t<td><strong>";
                // line 151
                echo (isset($context["TOTAL_ORPHAN"]) ? $context["TOTAL_ORPHAN"] : null);
                echo "</strong></td>
\t";
            } else {
                // line 153
                echo "\t\t<td>&nbsp;</td>
\t\t<td>&nbsp;</td>
\t";
            }
            // line 156
            echo "\t</tr>
\t</tbody>
\t</table>

\t";
            // line 160
            if ((isset($context["S_ACTION_OPTIONS"]) ? $context["S_ACTION_OPTIONS"] : null)) {
                // line 161
                echo "\t\t<fieldset>
\t\t\t<legend>";
                // line 162
                echo $this->env->getExtension('phpbb')->lang("STATISTIC_RESYNC_OPTIONS");
                echo "</legend>

\t\t\t<form id=\"action_online_form\" method=\"post\" action=\"";
                // line 164
                echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
                echo "\" data-ajax=\"true\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_online\">";
                // line 166
                echo $this->env->getExtension('phpbb')->lang("RESET_ONLINE");
                echo "</label><br /><span>&nbsp;</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"online\" /><input class=\"button2\" type=\"submit\" id=\"action_online\" name=\"action_online\" value=\"";
                // line 167
                echo $this->env->getExtension('phpbb')->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t<form id=\"action_date_form\" method=\"post\" action=\"";
                // line 171
                echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
                echo "\" data-ajax=\"true\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_date\">";
                // line 173
                echo $this->env->getExtension('phpbb')->lang("RESET_DATE");
                echo "</label><br /><span>&nbsp;</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"date\" /><input class=\"button2\" type=\"submit\" id=\"action_date\" name=\"action_date\" value=\"";
                // line 174
                echo $this->env->getExtension('phpbb')->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t<form id=\"action_stats_form\" method=\"post\" action=\"";
                // line 178
                echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
                echo "\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_stats\">";
                // line 180
                echo $this->env->getExtension('phpbb')->lang("RESYNC_STATS");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("RESYNC_STATS_EXPLAIN");
                echo "</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"stats\" /><input class=\"button2\" type=\"submit\" id=\"action_stats\" name=\"action_stats\" value=\"";
                // line 181
                echo $this->env->getExtension('phpbb')->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t<form id=\"action_user_form\" method=\"post\" action=\"";
                // line 185
                echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
                echo "\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_user\">";
                // line 187
                echo $this->env->getExtension('phpbb')->lang("RESYNC_POSTCOUNTS");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("RESYNC_POSTCOUNTS_EXPLAIN");
                echo "</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"user\" /><input class=\"button2\" type=\"submit\" id=\"action_user\" name=\"action_user\" value=\"";
                // line 188
                echo $this->env->getExtension('phpbb')->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t<form id=\"action_db_track_form\" method=\"post\" action=\"";
                // line 192
                echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
                echo "\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_db_track\">";
                // line 194
                echo $this->env->getExtension('phpbb')->lang("RESYNC_POST_MARKING");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("RESYNC_POST_MARKING_EXPLAIN");
                echo "</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"db_track\" /><input class=\"button2\" type=\"submit\" id=\"action_db_track\" name=\"action_db_track\" value=\"";
                // line 195
                echo $this->env->getExtension('phpbb')->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t";
                // line 199
                if ((isset($context["S_FOUNDER"]) ? $context["S_FOUNDER"] : null)) {
                    // line 200
                    echo "\t\t\t<form id=\"action_purge_sessions_form\" method=\"post\" action=\"";
                    echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
                    echo "\" data-ajax=\"true\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_purge_sessions\">";
                    // line 202
                    echo $this->env->getExtension('phpbb')->lang("PURGE_SESSIONS");
                    echo "</label><br /><span>";
                    echo $this->env->getExtension('phpbb')->lang("PURGE_SESSIONS_EXPLAIN");
                    echo "</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"purge_sessions\" /><input class=\"button2\" type=\"submit\" id=\"action_purge_sessions\" name=\"action_purge_sessions\" value=\"";
                    // line 203
                    echo $this->env->getExtension('phpbb')->lang("RUN");
                    echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>
\t\t\t";
                }
                // line 207
                echo "
\t\t\t<form id=\"action_purge_cache_form\" method=\"post\" action=\"";
                // line 208
                echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
                echo "\" data-ajax=\"true\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_purge_cache\">";
                // line 210
                echo $this->env->getExtension('phpbb')->lang("PURGE_CACHE");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("PURGE_CACHE_EXPLAIN");
                echo "</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"purge_cache\" /><input class=\"button2\" type=\"submit\" id=\"action_purge_cache\" name=\"action_purge_cache\" value=\"";
                // line 211
                echo $this->env->getExtension('phpbb')->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t";
                // line 215
                // line 216
                echo "  \t\t</fieldset>
\t";
            }
            // line 218
            echo "
\t";
            // line 219
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "log"))) {
                // line 220
                echo "\t\t<h2>";
                echo $this->env->getExtension('phpbb')->lang("ADMIN_LOG");
                echo "</h2>

\t\t<p>";
                // line 222
                echo $this->env->getExtension('phpbb')->lang("ADMIN_LOG_INDEX_EXPLAIN");
                echo "</p>

\t\t<div style=\"text-align: right;\"><a href=\"";
                // line 224
                echo (isset($context["U_ADMIN_LOG"]) ? $context["U_ADMIN_LOG"] : null);
                echo "\">&raquo; ";
                echo $this->env->getExtension('phpbb')->lang("VIEW_ADMIN_LOG");
                echo "</a></div>

\t\t<table class=\"table1 zebra-table\">
\t\t<thead>
\t\t<tr>
\t\t\t<th>";
                // line 229
                echo $this->env->getExtension('phpbb')->lang("USERNAME");
                echo "</th>
\t\t\t<th>";
                // line 230
                echo $this->env->getExtension('phpbb')->lang("IP");
                echo "</th>
\t\t\t<th>";
                // line 231
                echo $this->env->getExtension('phpbb')->lang("TIME");
                echo "</th>
\t\t\t<th>";
                // line 232
                echo $this->env->getExtension('phpbb')->lang("ACTION");
                echo "</th>
\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t";
                // line 236
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "log"));
                foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                    // line 237
                    echo "\t\t\t<tr>
\t\t\t\t<td>";
                    // line 238
                    echo $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "USERNAME");
                    echo "</td>
\t\t\t\t<td style=\"text-align: center;\">";
                    // line 239
                    echo $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "IP");
                    echo "</td>
\t\t\t\t<td style=\"text-align: center;\">";
                    // line 240
                    echo $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "DATE");
                    echo "</td>
\t\t\t\t<td>";
                    // line 241
                    echo $this->getAttribute((isset($context["log"]) ? $context["log"] : null), "ACTION");
                    echo "</td>
\t\t\t</tr>
\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 244
                echo "\t\t</tbody>
\t\t</table>
\t";
            }
            // line 247
            echo "
\t";
            // line 248
            if ((isset($context["S_INACTIVE_USERS"]) ? $context["S_INACTIVE_USERS"] : null)) {
                // line 249
                echo "\t\t<h2>";
                echo $this->env->getExtension('phpbb')->lang("INACTIVE_USERS");
                echo "</h2>

\t\t<p>";
                // line 251
                echo $this->env->getExtension('phpbb')->lang("INACTIVE_USERS_EXPLAIN_INDEX");
                echo "</p>

\t\t<div style=\"text-align: right;\"><a href=\"";
                // line 253
                echo (isset($context["U_INACTIVE_USERS"]) ? $context["U_INACTIVE_USERS"] : null);
                echo "\">&raquo; ";
                echo $this->env->getExtension('phpbb')->lang("VIEW_INACTIVE_USERS");
                echo "</a></div>

\t\t<table class=\"table1 zebra-table\">
\t\t<thead>
\t\t<tr>
\t\t\t<th>";
                // line 258
                echo $this->env->getExtension('phpbb')->lang("USERNAME");
                echo "</th>
\t\t\t<th>";
                // line 259
                echo $this->env->getExtension('phpbb')->lang("JOINED");
                echo "</th>
\t\t\t<th>";
                // line 260
                echo $this->env->getExtension('phpbb')->lang("INACTIVE_DATE");
                echo "</th>
\t\t\t<th>";
                // line 261
                echo $this->env->getExtension('phpbb')->lang("LAST_VISIT");
                echo "</th>
\t\t\t<th>";
                // line 262
                echo $this->env->getExtension('phpbb')->lang("INACTIVE_REASON");
                echo "</th>
\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t";
                // line 266
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "inactive"));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["inactive"]) {
                    // line 267
                    echo "\t\t\t<tr>
\t\t\t\t<td style=\"vertical-align: top;\">
\t\t\t\t\t";
                    // line 269
                    echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "USERNAME_FULL");
                    echo "
\t\t\t\t\t";
                    // line 270
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
                    // line 271
                    echo "\t\t\t\t</td>
\t\t\t\t<td style=\"vertical-align: top;\">";
                    // line 272
                    echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "JOINED");
                    echo "</td>
\t\t\t\t<td style=\"vertical-align: top;\">";
                    // line 273
                    echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "INACTIVE_DATE");
                    echo "</td>
\t\t\t\t<td style=\"vertical-align: top;\">";
                    // line 274
                    echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "LAST_VISIT");
                    echo "</td>
\t\t\t\t<td style=\"vertical-align: top;\">
\t\t\t\t\t";
                    // line 276
                    echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "REASON");
                    echo "
\t\t\t\t\t";
                    // line 277
                    if ($this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "REMINDED")) {
                        echo "<br />";
                        echo $this->getAttribute((isset($context["inactive"]) ? $context["inactive"] : null), "REMINDED_EXPLAIN");
                    }
                    // line 278
                    echo "\t\t\t\t</td>
\t\t\t</tr>
\t\t";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 281
                    echo "\t\t\t<tr>
\t\t\t\t<td colspan=\"5\" style=\"text-align: center;\">";
                    // line 282
                    echo $this->env->getExtension('phpbb')->lang("NO_INACTIVE_USERS");
                    echo "</td>
\t\t\t</tr>
\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['inactive'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 285
                echo "\t\t</tbody>
\t\t</table>
\t";
            }
            // line 288
            echo "
";
        }
        // line 290
        echo "
";
        // line 291
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
        return "acp_main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  829 => 291,  826 => 290,  822 => 288,  817 => 285,  808 => 282,  805 => 281,  798 => 278,  793 => 277,  789 => 276,  784 => 274,  780 => 273,  776 => 272,  773 => 271,  760 => 270,  756 => 269,  752 => 267,  747 => 266,  740 => 262,  736 => 261,  732 => 260,  728 => 259,  724 => 258,  714 => 253,  709 => 251,  703 => 249,  701 => 248,  698 => 247,  693 => 244,  684 => 241,  680 => 240,  676 => 239,  672 => 238,  669 => 237,  665 => 236,  658 => 232,  654 => 231,  650 => 230,  646 => 229,  636 => 224,  631 => 222,  625 => 220,  623 => 219,  620 => 218,  616 => 216,  615 => 215,  608 => 211,  602 => 210,  597 => 208,  594 => 207,  587 => 203,  581 => 202,  575 => 200,  573 => 199,  566 => 195,  560 => 194,  555 => 192,  548 => 188,  542 => 187,  537 => 185,  530 => 181,  524 => 180,  519 => 178,  512 => 174,  508 => 173,  503 => 171,  496 => 167,  492 => 166,  487 => 164,  482 => 162,  479 => 161,  477 => 160,  471 => 156,  466 => 153,  461 => 151,  455 => 150,  453 => 149,  434 => 147,  428 => 145,  422 => 142,  417 => 141,  413 => 140,  408 => 139,  402 => 136,  397 => 135,  393 => 134,  388 => 133,  382 => 130,  377 => 129,  373 => 128,  368 => 127,  360 => 122,  355 => 121,  351 => 120,  346 => 119,  340 => 116,  335 => 115,  331 => 114,  326 => 113,  320 => 110,  315 => 109,  311 => 108,  306 => 107,  300 => 104,  295 => 103,  291 => 102,  286 => 101,  278 => 96,  274 => 95,  270 => 94,  266 => 93,  259 => 89,  255 => 87,  254 => 86,  251 => 85,  245 => 82,  242 => 81,  240 => 80,  237 => 79,  231 => 76,  228 => 75,  226 => 74,  223 => 73,  220 => 72,  214 => 69,  210 => 68,  207 => 67,  205 => 66,  202 => 65,  196 => 62,  192 => 61,  189 => 60,  187 => 59,  184 => 58,  178 => 55,  174 => 54,  171 => 53,  169 => 52,  166 => 51,  160 => 48,  156 => 47,  153 => 46,  150 => 45,  148 => 44,  145 => 43,  139 => 40,  135 => 39,  132 => 38,  130 => 37,  127 => 36,  121 => 33,  117 => 32,  114 => 31,  112 => 30,  109 => 29,  97 => 26,  93 => 25,  90 => 24,  78 => 21,  74 => 20,  70 => 19,  67 => 18,  65 => 17,  60 => 15,  55 => 13,  52 => 12,  46 => 9,  41 => 7,  38 => 6,  36 => 5,  31 => 2,  19 => 1,);
    }
}
