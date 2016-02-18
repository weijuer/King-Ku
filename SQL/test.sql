-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-02-16 20:55:56
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `aid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(16) NOT NULL,
  `content` varchar(60) DEFAULT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`aid`, `title`, `content`, `uid`) VALUES
(1, '文章1', '文章1正文内容...', 1),
(2, '文章2', '文章2正文内容...', 1),
(3, '文章3', '文章3正文内容...', 2),
(4, '文章4', '文章4正文内容...', 4);

-- --------------------------------------------------------

--
-- 表的结构 `clientinfo`
--

CREATE TABLE IF NOT EXISTS `clientinfo` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `invdate` char(32) NOT NULL DEFAULT '',
  `name` char(16) NOT NULL DEFAULT '0',
  `amount` int(8) NOT NULL DEFAULT '0',
  `tel` int(16) NOT NULL DEFAULT '0',
  `total` int(32) NOT NULL DEFAULT '0',
  `email` char(32) NOT NULL DEFAULT '',
  `note` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `clientinfo`
--

INSERT INTO `clientinfo` (`id`, `invdate`, `name`, `amount`, `tel`, `total`, `email`, `note`) VALUES
(1, '2010-05-24', 'test', 10, 2147483647, 300, '12345@163.com', 'note1');

-- --------------------------------------------------------

--
-- 表的结构 `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` char(15) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `guestbook`
--

INSERT INTO `guestbook` (`id`, `nickname`, `email`, `content`, `createtime`) VALUES
(8, 'admin', 'admin@5idev.com', '嗯嗯', 1283336315),
(7, 'Jack', 'jack@hotmail.com', 'okok', 1283336315),
(6, 'Tom', 'tom@gmail.com', 'Hello', 1283336218),
(5, '小丽', 'xiaoli@tom.com', 'haha', 1283276566),
(4, '小张', 'xiaozhang@163.com', '来看看', 1264169118),
(3, '小明', 'xiaoming@163.com', '暂无', 1264168865),
(2, 'user', 'user@163.com', '大家好', 1264168127),
(1, 'admin', 'admin@5idev.com', '留言测试', 1264167501),
(9, '阿里巴巴', 'alibaba@5idev.com', '来看看', 1283337158),
(10, '路人甲', 'haha@163.com', '哈哈哈', 1283338228);

-- --------------------------------------------------------

--
-- 表的结构 `muser`
--

CREATE TABLE IF NOT EXISTS `muser` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  `regdate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `muser`
--

INSERT INTO `muser` (`uid`, `username`, `password`, `email`, `regdate`) VALUES
(1, 'weijuer01', 'e10adc3949ba59abbe56e057f20f883e', '12@qq.com', 1437297721);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `name` char(32) NOT NULL DEFAULT '',
  `sex` char(2) NOT NULL DEFAULT '',
  `age` int(8) NOT NULL DEFAULT '0',
  `tel` int(16) NOT NULL DEFAULT '0',
  `email` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `name`, `sex`, `age`, `tel`, `email`) VALUES
(1, 'zhangsan', '男', 24, 11111111, 'zhangsan@163.com'),
(2, 'lisi', '0', 12, 2222222, 'aaaa@aaaa.com'),
(3, 'wangxiao', '1', 23, 3333333, 'bbbb@bbbb.com'),
(4, 'wangya', '0', 34, 444444444, 'cccc@cccc.com'),
(5, 'wansy', '1', 45, 555555555, 'ddddd@ddddd.com'),
(6, 'liudehua', '0', 56, 66666666, 'eeee@eeee.com'),
(7, 'zhangziyi', '1', 78, 77777777, 'ffff@ffff.com'),
(8, 'ziyi', '0', 89, 888888888, 'ggggg@gggg.com'),
(9, 'www', '1', 22, 999999999, 'iiii@iiii.com');

-- --------------------------------------------------------

--
-- 表的结构 `think_form`
--

CREATE TABLE IF NOT EXISTS `think_form` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  `regdate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `email`, `regdate`) VALUES
(1, 'weijuer01', 'e10adc3949ba59abbe56e057f20f883e', '123@qq.com', 1437295524);

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `uid` int(128) NOT NULL AUTO_INCREMENT,
  `name` char(32) NOT NULL DEFAULT '0',
  `sex` int(2) NOT NULL DEFAULT '0',
  `age` int(8) NOT NULL DEFAULT '0',
  `tel` int(12) NOT NULL DEFAULT '0',
  `email` char(32) NOT NULL DEFAULT '',
  `note` char(32) NOT NULL DEFAULT '',
  `regdate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`uid`, `name`, `sex`, `age`, `tel`, `email`, `note`, `regdate`) VALUES
(1, 'zhangsan', 0, 12, 2147483647, '123@126.com', '暂无', 20150725),
(2, 'lisi', 1, 20, 2147483647, '1234@126.com', '暂无', 20150726),
(3, 'wangwu', 0, 28, 2147483647, '12345@126.com', '暂无', 20150727);

-- --------------------------------------------------------

--
-- 表的结构 `weijuer_form`
--

CREATE TABLE IF NOT EXISTS `weijuer_form` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `weijuer_form`
--

INSERT INTO `weijuer_form` (`id`, `title`, `content`, `create_time`) VALUES
(1, '测试', '这里是测试1', 1443621385),
(2, '我是测试', '我是测试，第二条哦', 1443621485);

-- --------------------------------------------------------

--
-- 表的结构 `weijuer_guestsay`
--

CREATE TABLE IF NOT EXISTS `weijuer_guestsay` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` char(16) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `face` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `content` text NOT NULL,
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `clientip` char(15) NOT NULL,
  `reply` text,
  `replytime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `weijuer_guestsay`
--

INSERT INTO `weijuer_guestsay` (`id`, `nickname`, `email`, `face`, `content`, `createtime`, `clientip`, `reply`, `replytime`) VALUES
(1, 'xiaoming是我的', 'xiaoming22@126.com', 1, '我是小明，大家好！', 1446386620, '127.0.0.1', '你好！', 1438360014),
(2, 'xiaoming是我的', 'xiaoming22@126.com', 7, '我是小明，大家好！', 1446386620, '127.0.0.1', '谢谢提醒', 1438359928),
(3, 'xiaoming是我的', 'xiaoming22@126.com', 2, '我是小明，大家好！', 1446386620, '127.0.0.1', NULL, NULL),
(4, 'xiaoming是我的', 'xiaoming22@126.com', 3, '我是小明，大家好！', 1446386620, '127.0.0.1', NULL, NULL),
(5, 'xiaoming是我的', 'xiaoming22@126.com', 4, '我是小明，大家好！', 1446386620, '127.0.0.1', NULL, NULL),
(6, 'xiaoming是我的', 'xiaoming22@126.com', 4, '我是小明，大家好！', 1446386620, '127.0.0.1', '陡壁', 1438698940),
(7, 'xiaoming是我的', 'xiaoming22@126.com', 7, '我是小明，大家好！', 1446386620, '127.0.0.1', NULL, NULL),
(8, 'xiaoming是我的', 'xiaoming22@126.com', 9, '我是小明，大家好！', 1446386620, '127.0.0.1', NULL, NULL),
(9, 'xiaoming是我的', 'xiaoming22@126.com', 5, '我是小明，大家好！', 1446386620, '127.0.0.1', NULL, NULL),
(10, 'xiaoming是我的', 'xiaoming22@126.com', 1, '我是小明，大家好！', 1446386620, '127.0.0.1', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `weijuer_movies`
--

CREATE TABLE IF NOT EXISTS `weijuer_movies` (
  `mid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '电影id',
  `moviename` char(60) NOT NULL DEFAULT '' COMMENT '电影名称',
  `size` char(32) NOT NULL DEFAULT '' COMMENT '电影大小',
  `kind` char(11) NOT NULL DEFAULT '' COMMENT '电影分类',
  `is_seeded` char(3) NOT NULL DEFAULT '' COMMENT '是否种子',
  `is_hd` char(3) NOT NULL DEFAULT '' COMMENT '是否高清',
  `user` char(20) NOT NULL DEFAULT '' COMMENT '发布者',
  `regdate` int(10) unsigned NOT NULL COMMENT '发布时间',
  `lastdate` int(10) unsigned NOT NULL COMMENT '更新时间',
  `regip` char(15) NOT NULL DEFAULT '' COMMENT '注册ip',
  `downloadnum` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `link` char(32) NOT NULL DEFAULT '' COMMENT '下载链接地址',
  PRIMARY KEY (`mid`),
  UNIQUE KEY `moviename` (`moviename`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `weijuer_movies`
--

INSERT INTO `weijuer_movies` (`mid`, `moviename`, `size`, `kind`, `is_seeded`, `is_hd`, `user`, `regdate`, `lastdate`, `regip`, `downloadnum`, `link`) VALUES
(2, '夏洛特的烦恼', '1.2G', '动作片', '否', '否', '朕乐联盟', 1446989501, 1447498268, '', 0, '暂无'),
(5, '秘密特工', '1.3G', '动作片', '是', '是', '朕乐联盟', 1447476965, 1447477087, '', 0, '暂无');

-- --------------------------------------------------------

--
-- 表的结构 `weijuer_musers`
--

CREATE TABLE IF NOT EXISTS `weijuer_musers` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` char(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `sex` char(3) NOT NULL DEFAULT '' COMMENT '性别',
  `age` int(3) NOT NULL DEFAULT '0' COMMENT '年龄',
  `headpic` char(20) NOT NULL DEFAULT '' COMMENT '头像',
  `regdate` int(10) unsigned NOT NULL COMMENT '注册时间',
  `lastdate` int(10) unsigned NOT NULL COMMENT '最后一次登录时间',
  `regip` char(15) NOT NULL DEFAULT '' COMMENT '注册ip',
  `lastip` char(15) NOT NULL DEFAULT '' COMMENT '最后一次登录ip',
  `loginnum` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `islock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否锁定',
  `overduedate` int(10) unsigned NOT NULL COMMENT '账户过期时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态-用于软删除',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `email` (`email`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `weijuer_musers`
--

INSERT INTO `weijuer_musers` (`userid`, `username`, `password`, `email`, `mobile`, `sex`, `age`, `headpic`, `regdate`, `lastdate`, `regip`, `lastip`, `loginnum`, `islock`, `overduedate`, `status`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'ch123@126.com', '', '', 0, '', 1446125461, 1453117814, '127.0.0.1', '127.0.0.1', 32, 0, 0, 0),
(2, 'test', 'c33367701511b4f6020ec61ded352059', '1234567@qq.com', '', '', 0, '', 1446972157, 1446986833, '127.0.0.1', '127.0.0.1', 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `weijuer_users`
--

CREATE TABLE IF NOT EXISTS `weijuer_users` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `companyid` mediumint(8) unsigned NOT NULL COMMENT '公司id',
  `pid` mediumint(8) NOT NULL COMMENT '父id',
  `username` char(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `nickname` char(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `sex` char(3) NOT NULL DEFAULT '' COMMENT '性别',
  `age` int(3) NOT NULL DEFAULT '0' COMMENT '年龄',
  `headpic` char(20) NOT NULL DEFAULT '' COMMENT '头像',
  `regdate` int(10) unsigned NOT NULL COMMENT '注册时间',
  `lastdate` int(10) unsigned NOT NULL COMMENT '最后一次登录时间',
  `regip` char(15) NOT NULL DEFAULT '' COMMENT '注册ip',
  `lastip` char(15) NOT NULL DEFAULT '' COMMENT '最后一次登录ip',
  `loginnum` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `islock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否锁定',
  `vip` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否会员',
  `overduedate` int(10) unsigned NOT NULL COMMENT '账户过期时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态-用于软删除',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `email` (`email`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `weijuer_users`
--

INSERT INTO `weijuer_users` (`userid`, `companyid`, `pid`, `username`, `password`, `nickname`, `sex`, `age`, `headpic`, `regdate`, `lastdate`, `regip`, `lastip`, `loginnum`, `email`, `mobile`, `islock`, `vip`, `overduedate`, `status`) VALUES
(1, 1, 0, '大神', 'e10adc3949ba59abbe56e057f20f883e', '', '男', 28, '20151023221027.png', 1445609300, 1445611836, '127.0.0.1', '127.0.0.1', 5, '', '13811111111', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `weijuer_videos`
--

CREATE TABLE IF NOT EXISTS `weijuer_videos` (
  `vid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '资源vid',
  `videoname` char(60) NOT NULL DEFAULT '' COMMENT '资源名称',
  `size` char(32) NOT NULL DEFAULT '' COMMENT '资源大小',
  `kind` char(11) NOT NULL DEFAULT '' COMMENT '资源分类',
  `lang` char(11) NOT NULL DEFAULT '' COMMENT '资源语言',
  `age` char(6) NOT NULL DEFAULT '' COMMENT '资源年代',
  `region` char(6) NOT NULL DEFAULT '' COMMENT '资源地区',
  `director` char(6) NOT NULL DEFAULT '' COMMENT '导演',
  `casts` varchar(200) NOT NULL DEFAULT '' COMMENT '主演',
  `poster` char(20) NOT NULL DEFAULT '' COMMENT '资源海报',
  `plot` text NOT NULL COMMENT '剧情简介',
  `shotcuts` varchar(200) NOT NULL DEFAULT '' COMMENT '影片截图',
  `video_details` text NOT NULL COMMENT '影片详情',
  `is_seeded` char(3) NOT NULL DEFAULT '' COMMENT '是否种子',
  `is_hd` char(6) NOT NULL DEFAULT '' COMMENT '清晰度',
  `user` char(20) NOT NULL DEFAULT '' COMMENT '发布者',
  `regdate` int(10) unsigned NOT NULL COMMENT '发布时间',
  `lastdate` int(10) unsigned NOT NULL COMMENT '更新时间',
  `regip` char(15) NOT NULL DEFAULT '' COMMENT '注册ip',
  `downloadnum` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `view` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '资源浏览次数',
  `link` char(32) NOT NULL DEFAULT '' COMMENT '下载链接地址',
  PRIMARY KEY (`vid`),
  UNIQUE KEY `moviename` (`videoname`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `weijuer_videos`
--

INSERT INTO `weijuer_videos` (`vid`, `videoname`, `size`, `kind`, `lang`, `age`, `region`, `director`, `casts`, `poster`, `plot`, `shotcuts`, `video_details`, `is_seeded`, `is_hd`, `user`, `regdate`, `lastdate`, `regip`, `downloadnum`, `view`, `link`) VALUES
(1, ' 西游记之大圣归来', '703.5M', 'KF,XJ,DH', 'CH', '2015', 'ND', '田晓鹏', '张磊，童自荣，林子杰，吴文伦', '20160116110112.jpg', '《西游记之大圣归来》是根据中国传统神话故事进行拓展和演绎的3D动画电影。 大闹天宫后四百年多年，齐天大圣成了一个传说，在山妖横行的长安城，孤儿江流儿（林子杰 配音）与行脚僧法明（吴文伦 配音）相依为命，小小少年常常神往大闹天宫的孙悟空（张磊 配音）。 有一天，山妖（吴迪 配音）来劫掠童男童女，江流儿救了一个小女孩，惹得山妖追杀，他一路逃跑，跑进了五行山，盲打误撞地解除了孙悟空的封印。悟空自由之后只想回花果山，却无奈腕上封印未解，又欠江流儿人情，勉强地护送他回长安城。 一路上八戒（刘九容 配音）和白龙马也因缘际化地现身，但或落魄或魔性大发，英雄不再。妖王（童自荣 配音）为抢女童，布下夜店迷局，却发现悟空法力尽失，轻而易举地抓走了女童。悟空不愿再去救女童，江流儿决定自己去救。 日全食之日，在悬空寺，妖王准备将童男童女投入丹炉中，江流儿却冲进了道场，最后一战开始了……', '56519612af237.jpg', '', '0', 'BD', '朕乐联盟', 1448185123, 0, '127.0.0.1', 0, 177, '暂无'),
(2, '夏洛特烦恼[DVD版]', '805M', 'AQ,XJ', 'CH', '2015', 'ND', '闫非  彭大', '马丽，沈腾，尹正，艾伦', '20160116110142.jpg', '昔日校花秋雅（王智 饰）的婚礼正在隆重举行，学生时代暗恋秋雅的夏洛（沈腾 饰）看着周围事业成功的老同学，心中泛起酸味，借着七分醉意大闹婚礼现场，甚至惹得妻子马冬梅（马丽 饰）现场发飙，而他发泄过后却在马桶上睡着了。梦里他重回校园，追求到他心爱的女孩、让失望的母亲重展笑颜、甚至成为无所不能的流行乐坛巨星…… 醉生梦死中，他发现身边人都在利用自己，只有马冬梅是最值得珍惜的……', '56519612af237.jpg', '', '0', 'DVDSCR', '朕乐联盟', 1448187375, 0, '127.0.0.1', 0, 151, '暂无'),
(3, '港囧', '705M', 'XJ', 'CH', '2015', 'ND', '徐峥', '徐峥，赵薇，包贝尔，杜鹃', '20160116130111.jpg', '啊实打实', '56683523f1254.jpg', '', '0', 'BD', '朕', 1449669901, 0, '127.0.0.1', 0, 120, '暂无'),
(4, '同班同学', '815M', 'JQ', 'GD', '2015', 'GT', '陆以心', '邵音音，郭議芯，麥芷誼，廖子妤 ', '20160116130135.jpg', '《同班同学》讲三位问题少女无心读书，离开家庭之后一齐住，为生活要去做援交少女，后来她们竟然同时喜欢了同一个男人。', '', '', '0', 'HD', '朕', 1452920519, 0, '127.0.0.1', 0, 2, '暂无');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
