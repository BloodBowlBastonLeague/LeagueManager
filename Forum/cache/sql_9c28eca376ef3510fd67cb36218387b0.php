<?php exit; ?>
1438800637
SELECT m.*, u.user_colour, g.group_colour, g.group_type FROM (forum_moderator_cache m) LEFT JOIN forum_users u ON (m.user_id = u.user_id) LEFT JOIN forum_groups g ON (m.group_id = g.group_id) WHERE m.display_on_index = 1
497
a:2:{i:0;a:9:{s:8:"forum_id";s:1:"0";s:7:"user_id";s:1:"0";s:8:"username";s:0:"";s:8:"group_id";s:1:"9";s:10:"group_name";s:12:"Commissaires";s:16:"display_on_index";s:1:"1";s:11:"user_colour";N;s:12:"group_colour";s:0:"";s:10:"group_type";s:1:"1";}i:1;a:9:{s:8:"forum_id";s:1:"0";s:7:"user_id";s:1:"0";s:8:"username";s:0:"";s:8:"group_id";s:1:"8";s:10:"group_name";s:15:"Administrateurs";s:16:"display_on_index";s:1:"1";s:11:"user_colour";N;s:12:"group_colour";s:0:"";s:10:"group_type";s:1:"1";}}