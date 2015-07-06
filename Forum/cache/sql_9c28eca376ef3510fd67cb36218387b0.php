<?php exit; ?>
1436198865
SELECT m.*, u.user_colour, g.group_colour, g.group_type FROM (forum_moderator_cache m) LEFT JOIN forum_users u ON (m.user_id = u.user_id) LEFT JOIN forum_groups g ON (m.group_id = g.group_id) WHERE m.display_on_index = 1
6
a:0:{}