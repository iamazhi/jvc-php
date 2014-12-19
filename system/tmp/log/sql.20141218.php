<?php die();?> 
20141218 11:02:22: /install.php

20141218 11:02:24: /install.php?m=install&f=step1

20141218 11:02:25: /install.php?m=install&f=step2

20141218 11:02:25: /install.php

20141218 11:02:43: /install.php?m=install&f=step3

20141218 11:02:43: /install.php?m=install&f=step4

20141218 11:02:47: /install.php?m=install&f=step4
  INSERT INTO jvc_user SET `account` = 'admin',`realname` = 'admin',`password` = '86f3059b228c8acf99e69734b6bb32cc',`admin` = 'super',`join` = '2014-12-18 11:02:47'
  REPLACE jvc_config SET `owner` = 'system',`module` = 'common',`section` = 'global',`key` = 'version',`value` = '3.2'

20141218 11:02:48: /install.php?m=install&f=step5
  REPLACE jvc_config SET `owner` = 'system',`module` = 'common',`section` = 'site',`key` = 'lang',`value` = 'zh-cn'

20141218 16:16:56: /flll.php

20141218 16:48:30: /flll.php

20141218 16:48:32: /flll.php

20141218 17:18:54: /install.php

20141218 17:19:17: /install.php

20141218 17:19:24: /install.php

20141218 17:19:24: /install.php

20141218 17:20:09: /install.php

20141218 17:20:19: /install.php

20141218 17:21:25: /install.php

20141218 17:22:52: 

20141218 17:22:55: 

20141218 17:22:55: 

20141218 17:23:18: 

20141218 17:24:20: 

20141218 17:24:35: 

20141218 17:24:40: 

20141218 17:26:39: 

20141218 17:26:46: 

20141218 17:26:49: 

20141218 17:27:20: 

20141218 17:27:31: 

20141218 17:27:53: 

20141218 17:29:07: 

20141218 17:29:24: 

20141218 17:29:33: 

20141218 17:30:26: 

20141218 17:30:28: 

20141218 17:31:13: 
  SELECT * FROM jvc_config WHERE owner IN ('system','guest') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'
  SELECT * FROM jvc_layout WHERE page IN ('all','index_index') AND template  = 'default'
  SELECT * FROM jvc_block
  SELECT * FROM jvc_config WHERE owner  = 'system' AND module  = 'common' AND section  = 'slides' ORDER BY `key`
  SELECT t1.*, t2.category FROM jvc_product AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE 1 = 1  AND t1.status  = 'normal' GROUP BY t2.id ORDER BY addedDate desc
  SELECT SQL_CALC_FOUND_ROWS  t1.*, t2.category FROM jvc_product AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  wHeRe 1 = 1  AND t1.status  = 'normal' gRoUp bY t2.id 
  SELECT t1.*, t2.category FROM jvc_product AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE 1 = 1  AND t1.status  = 'normal' GROUP BY t2.id ORDER BY addedDate desc
  SELECT t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE t1.type  = 'article' AND t1.addedDate  <= '2014-12-18 17:31:13' AND t1.status  = 'normal' GROUP BY t2.id ORDER BY addedDate desc
  SELECT SQL_CALC_FOUND_ROWS  t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  wHeRe t1.type  = 'article' AND t1.addedDate  <= '2014-12-18 17:31:13' AND t1.status  = 'normal' gRoUp bY t2.id 
  SELECT t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE t1.type  = 'article' AND t1.addedDate  <= '2014-12-18 17:31:13' AND t1.status  = 'normal' GROUP BY t2.id ORDER BY addedDate desc
  SELECT * FROM jvc_wx_public ORDER BY addedDate

20141218 17:31:19: 
  SELECT * FROM jvc_config WHERE owner IN ('system','guest') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'
  SELECT * FROM jvc_layout WHERE page IN ('all','index_index') AND template  = 'default'
  SELECT * FROM jvc_block
  SELECT * FROM jvc_config WHERE owner  = 'system' AND module  = 'common' AND section  = 'slides' ORDER BY `key`
  SELECT t1.*, t2.category FROM jvc_product AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE 1 = 1  AND t1.status  = 'normal' GROUP BY t2.id ORDER BY addedDate desc
  SELECT SQL_CALC_FOUND_ROWS  t1.*, t2.category FROM jvc_product AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  wHeRe 1 = 1  AND t1.status  = 'normal' gRoUp bY t2.id 
  SELECT t1.*, t2.category FROM jvc_product AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE 1 = 1  AND t1.status  = 'normal' GROUP BY t2.id ORDER BY addedDate desc
  SELECT t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE t1.type  = 'article' AND t1.addedDate  <= '2014-12-18 17:31:19' AND t1.status  = 'normal' GROUP BY t2.id ORDER BY addedDate desc
  SELECT SQL_CALC_FOUND_ROWS  t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  wHeRe t1.type  = 'article' AND t1.addedDate  <= '2014-12-18 17:31:19' AND t1.status  = 'normal' gRoUp bY t2.id 
  SELECT t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE t1.type  = 'article' AND t1.addedDate  <= '2014-12-18 17:31:19' AND t1.status  = 'normal' GROUP BY t2.id ORDER BY addedDate desc
  SELECT * FROM jvc_wx_public ORDER BY addedDate

20141218 17:31:37: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:32:11: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:33:23: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:33:52: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:35:09: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:35:58: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:39:26: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:39:42: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:40:13: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:41:04: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:41:22: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:41:27: /flll.php?m=article&f=admin
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'
  SELECT t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE t1.type  = 'article' GROUP BY t2.id ORDER BY id desc
  SELECT SQL_CALC_FOUND_ROWS  t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  wHeRe t1.type  = 'article' gRoUp bY t2.id 
  SELECT t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE t1.type  = 'article' GROUP BY t2.id ORDER BY id desc
  SELECT * FROM jvc_category WHERE type  = 'article' ORDER BY grade desc, `order`

20141218 17:41:29: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:41:30: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:45:16: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:45:47: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:49:56: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:50:09: /flll.php
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:50:12: /flll.php?m=admin&f=index
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:50:13: /flll.php?m=article&f=admin
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'
  SELECT t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE t1.type  = 'article' GROUP BY t2.id ORDER BY id desc
  SELECT SQL_CALC_FOUND_ROWS  t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  wHeRe t1.type  = 'article' gRoUp bY t2.id 
  SELECT t1.*, t2.category FROM jvc_article AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE t1.type  = 'article' GROUP BY t2.id ORDER BY id desc
  SELECT * FROM jvc_category WHERE type  = 'article' ORDER BY grade desc, `order`

20141218 17:50:15: /flll.php?m=admin&f=index
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:50:16: /flll.php?m=admin&f=index
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:56:17: /flll.php?m=misc&f=ping&t=html
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:57:10: /flll.php?m=admin&f=index
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:57:11: /flll.php?m=site&f=setbasic
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:57:13: /flll.php?m=admin&f=index
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:57:14: /flll.php?m=company&f=setbasic
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:57:15: /flll.php?m=admin&f=index
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

20141218 17:57:16: /flll.php?m=product&f=admin
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'
  SELECT * FROM jvc_category WHERE type  = 'product' ORDER BY grade desc, `order`
  SELECT t1.*, t2.category FROM jvc_product AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE 1 = 1  GROUP BY t2.id ORDER BY `order` desc
  SELECT SQL_CALC_FOUND_ROWS  t1.*, t2.category FROM jvc_product AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  wHeRe 1 = 1  gRoUp bY t2.id 
  SELECT t1.*, t2.category FROM jvc_product AS t1  LEFT JOIN jvc_relation AS t2  ON t1.id = t2.id  WHERE 1 = 1  GROUP BY t2.id ORDER BY `order` desc

20141218 17:57:17: /flll.php?m=admin&f=index
  SELECT * FROM jvc_config WHERE owner IN ('system','admin') ORDER BY id
  SELECT alias, id as category, type as module FROM jvc_category WHERE alias  != '' AND type IN ('article','product')
  SELECT alias, id, 'page' as module FROM jvc_article WHERE type  = 'page'
  SELECT id, alias FROM jvc_category WHERE type  = 'forum'
  SELECT id, alias FROM jvc_category WHERE type  = 'blog'

