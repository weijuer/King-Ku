--管理平台用户信息表()
--userId:主键、手机号：索引
drop table t_mgr_manager;
create table t_mgr_manager(
  userId       number(10) primary key,          
  phone        varchar2(12) not null,           
  password     varchar2(34) not null,          
  nick         varchar2(20) not null,   
  regtime      varchar2(22) not null,
  jobNumber      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_mgr_manager.userId IS '用户id,主键自增长';
COMMENT ON COLUMN t_mgr_manager.phone IS '手机号';
COMMENT ON COLUMN t_mgr_manager.password IS '密码：6-8位数字或字母';
COMMENT ON COLUMN t_mgr_manager.nick IS '昵称';
COMMENT ON COLUMN t_mgr_manager.regtime IS '注册时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_mgr_manager.jobNumber IS '扩展字段1';
COMMENT ON COLUMN t_mgr_manager.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_mgr_manager.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_mgr_manager.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_mgr_manager.Column5 IS '扩展字段5';

--创建索引
CREATE UNIQUE INDEX mgr_index_phoneIndex ON t_mgr_manager(phone);

--创建序列
drop sequence seq_t_mgr_manager;
create sequence seq_t_mgr_manager
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;


--用户访问统计表(id、openID(微信用户ID)、用户id、是否注册、用户访问次数,登陆时间) 
drop table t_userCount;
create table t_userCount(
  id           number(10)  primary key,          
  openid       varchar2(100) not null,  
  userId       number(10), 
  isReg        number(2), 
  userCount    number(10),
  loginTime    varchar2(22),
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_userCount.id IS 'ID,主键自增长';
COMMENT ON COLUMN t_userCount.openid IS 'openID(微信用户ID)';
COMMENT ON COLUMN t_userCount.userId IS '用户id';
COMMENT ON COLUMN t_userCount.isReg IS '是否注册 0:否 1:是';
COMMENT ON COLUMN t_userCount.userCount IS '用户访问次数';
COMMENT ON COLUMN t_userCount.loginTime IS '登陆时间，格式：yyyy-MM-dd';
COMMENT ON COLUMN t_userCount.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_userCount.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_userCount.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_userCount.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_userCount.Column5 IS '扩展字段5';

--创建序列
drop sequence seq_t_userCount;
create sequence seq_t_userCount
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;




--用户信息表(用户id、手机号、密码、昵称、性别、年龄、学历、爱好、头像路径、注册时间)
--userId:主键、手机号：索引
drop table t_userInfo;
create table t_userInfo(
  userId       number(10) primary key,          
  phone        varchar2(12) not null,           
  password     varchar2(34) not null,          
  nick         varchar2(20) not null,   
  sex          number(2) default 2,      
  birthday     varchar2(20),     
  associator   number(2) default 0,
  interest     varchar2(60),     
  headPic      varchar2(20), 
  regtime      varchar2(22) not null,
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_userInfo.userId IS '用户id,主键自增长';
COMMENT ON COLUMN t_userInfo.phone IS '手机号';
COMMENT ON COLUMN t_userInfo.password IS '密码：6-8位数字或字母';
COMMENT ON COLUMN t_userInfo.nick IS '昵称';
COMMENT ON COLUMN t_userInfo.sex IS '性别：0-男、1-女、2-未知';
COMMENT ON COLUMN t_userInfo.birthday IS '生日，如：1990-12';
COMMENT ON COLUMN t_userInfo.associator IS '是否是会员：0-不是、1-是，默认不是';
COMMENT ON COLUMN t_userInfo.interest IS '兴趣爱好,多个用顿号‘、’分隔';
COMMENT ON COLUMN t_userInfo.headPic IS '头像图片名，.jpg格式，系统当前时间毫秒数为图片名称';
COMMENT ON COLUMN t_userInfo.regtime IS '注册时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_userInfo.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_userInfo.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_userInfo.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_userInfo.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_userInfo.Column5 IS '扩展字段5';

--创建索引
CREATE UNIQUE INDEX index_phoneIndex ON t_userInfo(phone);

--创建序列
drop sequence seq_t_userInfo;
create sequence seq_t_userInfo
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;


--兴趣爱好表(id、兴趣名称、描述、时间) 此表手动录入
drop table t_interest;
create table t_interest(
  id             number(10)  primary key,          
  interestName   varchar2(20) not null,  
  interestDesc   varchar2(100),    
  addTime        varchar2(22) not null,
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_interest.id IS 'ID,主键自增长';
COMMENT ON COLUMN t_interest.interestName IS '兴趣名称';
COMMENT ON COLUMN t_interest.interestDesc IS '兴趣名称';
COMMENT ON COLUMN t_interest.addTime IS '添加时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_interest.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_interest.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_interest.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_interest.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_interest.Column5 IS '扩展字段5';

--创建序列
drop sequence seq_t_interest;
create sequence seq_t_interest
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;
  

--场馆信息表(场馆id、第三方id、场馆名称、场馆地址、地点（经纬度）、场馆电话、场馆图片路径、场馆描述、
--           场地数量--?、价格--?、设施Facilities---?设施指什么
--           运动项目id、是否支持预定、是否与号百签约、是否特惠、是否可退订、城市id、区域id、场馆添加时间、最后更新时间)

drop table t_venuesInfo;
create table t_venuesInfo(
  venuesId             number(10)  primary key, 
  threeVenuesId       number(10) ,
  venuesName  varchar2(100)   not null, 
  venuesAddress       varchar2(100)   not null,           
  coordinate          varchar2(30)    not null,          
  venuesPhone          varchar2(12) , 
  venuesIconPic           varchar2(200),  	  
  venuesPic           varchar2(200),      
  venuesDesc          varchar2(100),     
  facilitiesId          varchar2(100), 
 sportNames          varchar2(100),   
 sitesNumber           number(2),   
  venuesLeve          number(2) ,  
  priceDesc          varchar2(100),   
  subscribe           number(2) default 0 not null,
  recommended         number(2) default 0 not null,
  signingHaoBai        number(2) default 0 not null,
  discount            number(2) default 0 not null,
  city                varchar2(20) not null,
  district            varchar2(20) not null,
  addTime             varchar2(22) not null,
  updateTime          varchar2(22) not null,
  unsubscribe         number(2) default 0 not null,
  cooperation         varchar2(10),
  openTime            varchar2(22)   not null,
    isDisplay            number(2) default 0  not null,
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10),
  Column6      varchar2(10),
  Column7      varchar2(10),
  Column8      varchar2(10),
  Column9      varchar2(10),
  Column10      varchar2(10)
);

COMMENT ON COLUMN t_venuesInfo.venuesId IS '场馆id,主键自增长';
COMMENT ON COLUMN t_venuesInfo.threeVenuesId IS '第三方场馆id';
COMMENT ON COLUMN t_venuesInfo.venuesName IS '场馆名称';
COMMENT ON COLUMN t_venuesInfo.venuesAddress IS '场馆地址';
COMMENT ON COLUMN t_venuesInfo.coordinate IS '坐标，纬度经度如：116.409443,39.952778';
COMMENT ON COLUMN t_venuesInfo.venuesIconPic IS '场馆icon图标';
COMMENT ON COLUMN t_venuesInfo.venuesPhone IS '场馆电话';
COMMENT ON COLUMN t_venuesInfo.venuesPic IS '场馆图片，保存图片名，多个用英文逗号‘,’分隔';
COMMENT ON COLUMN t_venuesInfo.venuesDesc IS '场馆描述';
COMMENT ON COLUMN t_venuesInfo.sitesNumber IS '场地数量';
COMMENT ON COLUMN t_venuesInfo.sportNames IS '项目名称，多个以英文逗号分隔';
COMMENT ON COLUMN t_venuesInfo.venuesLeve IS '场馆级别';
COMMENT ON COLUMN t_venuesInfo.priceDesc IS '价格描述';
COMMENT ON COLUMN t_venuesInfo.facilitiesId IS '设施服务';
COMMENT ON COLUMN t_venuesInfo.recommended IS '是否推荐：0-不推荐、1-推荐，默认0不支持';
COMMENT ON COLUMN t_venuesInfo.subscribe IS '是否支持预订：0-不支持、1-支持，默认0不支持';
COMMENT ON COLUMN t_venuesInfo.signingHaoBai IS '是否结算：0-不支持、1-支持，默认0不支持';
COMMENT ON COLUMN t_venuesInfo.discount IS '是否有优惠：0-不优惠、1-优惠，默认0不优惠';
COMMENT ON COLUMN t_venuesInfo.unsubscribe IS '是否退订：0-不支持、1-支持，默认0不支持';
COMMENT ON COLUMN t_venuesInfo.cooperation IS '合作方，如‘YX’表示亚信，';
COMMENT ON COLUMN t_venuesInfo.city IS '城市id';
COMMENT ON COLUMN t_venuesInfo.district IS '县/区id';
COMMENT ON COLUMN t_venuesInfo.addTime IS '场馆添加时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_venuesInfo.updateTime IS '场馆信息最后更新时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_venuesInfo.openTime IS '场馆开放时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_venuesInfo.isDisplay IS '是否显示，0-显示、1-不显示，默认0显示';
COMMENT ON COLUMN t_venuesInfo.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_venuesInfo.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_venuesInfo.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_venuesInfo.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_venuesInfo.Column5 IS '扩展字段5';


--创建序列
drop sequence seq_t_venuesInfo;
create sequence seq_t_venuesInfo
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;

  
  
--设施服务表(id、服务名称、描述、时间) 此表手动录入
drop table t_facilities;
create table t_facilities(
  id               number(10)   primary key,  
  facilitieId      varchar2(10) not null,          
  facilitieName   varchar2(20) not null,  
  facilitiePic    varchar2(100),  
  facilitieDesc   varchar2(100),    
  addTime        varchar2(22),
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_facilities.id IS 'ID,主键自增长';
COMMENT ON COLUMN t_facilities.facilitieId IS '服务ID';
COMMENT ON COLUMN t_facilities.facilitieName IS '服务名称';
COMMENT ON COLUMN t_facilities.facilitiePic IS '服务图片';
COMMENT ON COLUMN t_facilities.facilitieDesc IS '服务描述';
COMMENT ON COLUMN t_facilities.addTime IS '添加时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_facilities.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_facilities.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_facilities.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_facilities.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_facilities.Column5 IS '扩展字段5';
  
--场馆对应设施服务表(id、服务名称、描述、时间)
drop table t_venuesfacilities;
create table t_venuesfacilities(
	id               number(10)   primary key, 
	venuesId      	number(10)   not null,   
	facilitieId      varchar2(10) not null,          
	facilitieName   varchar2(20) not null,  
	facilitiePic    varchar2(100),  
	facilitieDesc   varchar2(100),    
	addTime        varchar2(22),
	Column1      varchar2(10),
	Column2      varchar2(10),
	Column3      varchar2(10),
	Column4      varchar2(10),
	Column5      varchar2(10)
);

COMMENT ON COLUMN t_venuesfacilities.id IS 'ID,主键自增长';
COMMENT ON COLUMN t_venuesfacilities.venuesId IS '场馆ID';
COMMENT ON COLUMN t_venuesfacilities.facilitieId IS '服务ID';
COMMENT ON COLUMN t_venuesfacilities.facilitieName IS '服务名称';
COMMENT ON COLUMN t_venuesfacilities.facilitiePic IS '服务图片';
COMMENT ON COLUMN t_venuesfacilities.facilitieDesc IS '服务描述';
COMMENT ON COLUMN t_venuesfacilities.addTime IS '添加时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_venuesfacilities.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_venuesfacilities.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_venuesfacilities.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_venuesfacilities.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_venuesfacilities.Column5 IS '扩展字段5';

--创建序列
drop sequence seq_t_facilities;
create sequence seq_t_facilities
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;
   
--创建序列
drop sequence seq_t_venuesfacilities;
create sequence seq_t_venuesfacilities
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;

--场馆对应运动项目表(id、场馆id、运动项目id、运动项目名称、添加时间)
drop table t_venuesSports;
create table t_venuesSports(
  id       number(10)    primary key, 
  venuesId      number(10)   not null, 
  sportId       number(10)    not null,         
  sportName     varchar2(22)  not null,    
  addTime       varchar2(22),
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_venuesSports.sportId IS '项目id,主键自增长';
COMMENT ON COLUMN t_venuesSports.venuesId IS '场馆id';
COMMENT ON COLUMN t_venuesSports.sportId IS '运动项目id';
COMMENT ON COLUMN t_venuesSports.sportName IS '运动名';
COMMENT ON COLUMN t_venuesSports.addTime IS '添加时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_venuesSports.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_venuesSports.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_venuesSports.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_venuesSports.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_venuesSports.Column5 IS '扩展字段5';

--创建序列
drop sequence seq_t_venuesSports;
create sequence seq_t_venuesSports
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;
  
--运动项目表(项目id、项目名、添加时间)
drop table t_sports;
create table t_sports(
  id            number(10)    primary key,
  sportId       number(10)    ,          
  sportName     varchar2(22)  not null,    
  addTime       varchar2(22),
  sportpic  VARCHAR2(10),
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_sports.id IS 'id';
COMMENT ON COLUMN t_sports.sportId IS '项目id';
COMMENT ON COLUMN t_sports.sportName IS '项目名称';
COMMENT ON COLUMN t_sports.addTime IS '添加时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_sports.sportpic IS '运动项目图片';
COMMENT ON COLUMN t_sports.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_sports.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_sports.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_sports.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_sports.Column5 IS '扩展字段5';

--创建序列
drop sequence seq_t_sports;
create sequence seq_t_sports
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;
  
 
--城市表(城市id、城市名称) 此表手动录入
drop table t_city;
create table t_city(
  id            number(10)    primary key,  
  cityId       varchar2(10)  not null,          
  cityName     varchar2(10) not null,    
  addTime      varchar2(22) ,
  firstLetter      varchar2(2) ,
  province    VARCHAR2(10),
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_city.id IS '自增长ID';
COMMENT ON COLUMN t_city.cityId IS '城市ID';
COMMENT ON COLUMN t_city.cityName IS '城市名';
COMMENT ON COLUMN t_city.addTime IS '添加时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_city.firstLetter IS '城市首字母';
COMMENT ON COLUMN T_CITY.province is '所属省';
COMMENT ON COLUMN t_city.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_city.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_city.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_city.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_city.Column5 IS '扩展字段5';

--创建序列
drop sequence seq_t_city;
create sequence seq_t_city
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;
  
--区域表(区域id、区县名称、城市id) 此表手动录入
drop table t_district;
create table t_district(
  id            number(10)    primary key,  
  districtId       varchar2(10) ,          
  districtName     varchar2(10)    not null,    
  cityId           varchar2(10)    not null,   
  addTime          varchar2(22),
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_district.id IS '主键自增长';
COMMENT ON COLUMN t_district.districtId IS '区/县id';
COMMENT ON COLUMN t_district.districtName IS '区/县名称';
COMMENT ON COLUMN t_district.cityId IS '所属城市ID';
COMMENT ON COLUMN t_district.addTime IS '添加时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_district.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_district.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_district.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_district.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_district.Column5 IS '扩展字段5';

--创建序列
drop sequence seq_t_district;
create sequence seq_t_district
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;
  
--用户收藏表(收藏id、用户id、场馆id、收藏状态、收藏时间)
drop table t_userFavorite;
create table t_userFavorite(
  favoriteId       number(10) primary key,          
  userId           number(10) not null,           
  venuesId         number(10) not null,          
  state             number(2)  not null,  
  favoriteTime     varchar2(22) not null,
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10) 
);

COMMENT ON COLUMN t_userFavorite.favoriteId IS '收藏id,主键自增长';
COMMENT ON COLUMN t_userFavorite.userId IS '收藏用户id';
COMMENT ON COLUMN t_userFavorite.venuesId IS '收藏的场馆id';
COMMENT ON COLUMN t_userFavorite.state IS '收藏状态：0-取消收藏、1-收藏';
COMMENT ON COLUMN t_userFavorite.favoriteTime IS '收藏时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_userFavorite.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_userFavorite.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_userFavorite.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_userFavorite.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_userFavorite.Column5 IS '扩展字段5';

--创建索引
CREATE  INDEX index_FavUserId ON t_userFavorite(userId);

--创建序列
drop sequence seq_t_userFavorite;
create sequence seq_t_userFavorite
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;
  
  
--场馆评价表(id、用户id、场馆id、评论内容、评分、评论时间)
drop table t_venuesCritical;
create table t_venuesCritical(
  criticalId       number(10) primary key,          
  userId           number(10) not null,
  nick             varchar2(30) not null,            
  venuesId         number(10) not null,  
  venuesName             varchar2(50) not null, 
  sportName             varchar2(30) not null,  
  criticalDesc     varchar2(100) not null,  
  venuesScore      number(2) not null,
  CriticalTime     varchar2(22) not null,
  orderid          number(10) not null,
  isanonymous      number(2) default 0,
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10) 
);

COMMENT ON COLUMN t_venuesCritical.criticalId IS '评论id,主键自增长';
COMMENT ON COLUMN t_venuesCritical.userId IS '评论人id';
COMMENT ON COLUMN t_venuesCritical.venuesId IS '评论的场馆id';
COMMENT ON COLUMN t_venuesCritical.criticalDesc IS '评论内容';
COMMENT ON COLUMN t_venuesCritical.venuesScore IS '评分';
COMMENT ON COLUMN t_venuesCritical.CriticalTime IS '评论时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_venuesCritical.orderid IS '订单id';
COMMENT ON COLUMN t_venuesCritical.isanonymous  IS '是否匿名';
COMMENT ON COLUMN t_venuesCritical.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_venuesCritical.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_venuesCritical.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_venuesCritical.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_venuesCritical.Column5 IS '扩展字段5';

--创建索引
CREATE  INDEX index_Critical_VenuesId ON t_venuesCritical(venuesId);

--创建序列
drop sequence seq_t_venuesCritical;
create sequence seq_t_venuesCritical
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;
  
--订单信息表(id、订单编号、订单名称、订单总价、订单实付、用户id、场馆id、是否评价、下单时间、订单状态、取票号、下单时间)
drop table t_order;
create table t_order(
  orderId              number(10) primary key,          
  orderSerialNumber    varchar2(18) not null,           
  orderName            varchar2(50) not null,
  tradeId              varchar2(30) not null,
  totalPrice           number(10) not null,  
  actualPrice          number(10) not null,
  userId               number(10) not null,
  venuesId             number(10) not null,
  sportsName           varchar2(10) not null,    
  isCritical           number(2) default 0 not null,
  orderState           number(2) not null,
  orderCreateTime              varchar2(22) not null,
  orderPayTime              varchar2(22),
  orderPayType              number(2),
  phone      varchar2(12),
  orderreqtranseq   VARCHAR2(30),,
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10) 
);

COMMENT ON COLUMN t_order.orderId IS '订单id,主键自增长';
COMMENT ON COLUMN t_order.orderSerialNumber IS '订单序列号，规则：‘HB’+当前时间，例如：HB20151207112636';
COMMENT ON COLUMN t_order.orderName IS '订单名称(场馆名称)';
COMMENT ON COLUMN t_order.tradeId IS '生成二维码标识';
COMMENT ON COLUMN t_order.totalPrice IS '订单总价';
COMMENT ON COLUMN t_order.actualPrice IS '订单实付价';
COMMENT ON COLUMN t_order.userId IS '下单用户ID';
COMMENT ON COLUMN t_order.venuesId IS '场馆ID';
COMMENT ON COLUMN t_order.sportsName IS '运动名称';
COMMENT ON COLUMN t_order.isCritical IS '是否评价：0-未评价、1-已评价，默认未评价';
COMMENT ON COLUMN t_order.orderState IS '订单状态：1-待付款、2-已付款、3-已消费、5-已退款、6-已取消';
COMMENT ON COLUMN t_order.orderCreateTime IS '订单创建时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_order.orderPayTime IS '订单支付时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_order.orderPayType IS '订单支付类型，1、翼支付;2、微信支付 ';
COMMENT ON COLUMN t_order.phone IS '手机号';
COMMENT ON COLUMN t_order.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_order.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_order.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_order.Column5 IS '扩展字段5';

--创建索引
CREATE  INDEX index_order_userId ON t_order(userId);

--创建序列
drop sequence seq_t_order;
create sequence seq_t_order
  minvalue 1
  maxvalue 2140000000000
  start with 10000
  increment by 1
  cache 20;
  
  
--订单详情表(订单详情id、订单编号、商品名、单价、数量、原价、折扣、实付、创建时间、开始时间、结束时间)
drop table t_orderDetail;
create table t_orderDetail(
  id                   number(10) primary key,          
  orderId              number(10) not null,
  venuesNum        varchar2(30),  
  startTime            varchar2(22) not null,
  endTime              varchar2(22) not null,
  unitPrice            number(10) not null,  
  num               number(2), 
  originalPrice        number(10),
  discount             number(2),
  actualPrice          number(10) not null,
  addTime              varchar2(22) not null,
   Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_orderDetail.id IS '订单详情id,主键自增长';
COMMENT ON COLUMN t_orderDetail.orderId IS '订单id';
COMMENT ON COLUMN t_orderDetail.venuesNum IS '场地号';
COMMENT ON COLUMN t_orderDetail.startTime IS '预约开始时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_orderDetail.endTime IS '预约结束时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_orderDetail.unitPrice IS '商品单价';
COMMENT ON COLUMN t_orderDetail.num IS '购买数量';
COMMENT ON COLUMN t_orderDetail.originalPrice IS '原价';
COMMENT ON COLUMN t_orderDetail.discount IS '折扣';
COMMENT ON COLUMN t_orderDetail.actualPrice IS '折扣后价格';
COMMENT ON COLUMN t_orderDetail.addTime IS '下单时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_orderDetail.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_orderDetail.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_orderDetail.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_orderDetail.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_orderDetail.Column5 IS '扩展字段5';

--创建索引
CREATE  INDEX index_orderDetail ON t_orderDetail(orderId);

--创建序列
drop sequence seq_t_orderDetail;
create sequence seq_t_orderDetail
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;
  
  

--支付信息表(支付id、支付方、接收方、金额、支付方式、订单id、状态、支付时间)
drop table t_payInfo;
create table t_payInfo(
  payId             number(10) primary key,
  uptranSeq         varchar2(30) not null,
  fromUser          varchar2(30) not null,           
  toUser            varchar2(30) not null,  
  amountMoney       number(10,2) not null,
  payType           number(2) not null,
  orderId           number(10) not null,  
  payState          number(2) not null,
  payTime           varchar2(22) not null,
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)  
);

COMMENT ON COLUMN t_payInfo.payId IS '支付信息id,主键自增长';
COMMENT ON COLUMN t_payInfo.uptranSeq IS '翼支付订单号';
COMMENT ON COLUMN t_payInfo.fromUser IS '支付方';
COMMENT ON COLUMN t_payInfo.toUser IS '接收方';
COMMENT ON COLUMN t_payInfo.amountMoney IS '金额';
COMMENT ON COLUMN t_payInfo.payType IS '支付类型：0-微信、1-翼支付、2-支付宝、3卡支付';
COMMENT ON COLUMN t_payInfo.orderId IS '订单id';
COMMENT ON COLUMN t_payInfo.payState IS '支付状态：0-支付成功、1-支付失败';
COMMENT ON COLUMN t_payInfo.payTime IS '支付时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_payInfo.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_payInfo.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_payInfo.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_payInfo.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_payInfo.Column5 IS '扩展字段5';

--创建索引
CREATE  INDEX index_pay_orderId ON t_payInfo(orderId);

--创建序列
drop sequence seq_t_payInfo;
create sequence seq_t_payInfo
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;
  
--消息表(消息id、消息内容、消息类型、用户id)
drop table t_information;
create table t_information(
  id            number(10) primary key,          
  infoDesc      varchar2(500) not null,           
  infoType      number(2) not null,  
  userId        varchar2(22),
  addTime       varchar2(22) not null,
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_information.id IS '消息id,主键自增长';
COMMENT ON COLUMN t_information.infoDesc IS '消息内容';
COMMENT ON COLUMN t_information.infoType IS '消息类型：0-系统消息、1-活动消息、2-针对个人用户信息';
COMMENT ON COLUMN t_information.userId IS '通知人，用户id';
COMMENT ON COLUMN t_information.addTime IS '添加通知时间，格式：yyyy-MM-dd HH:mm:ss';
COMMENT ON COLUMN t_information.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_information.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_information.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_information.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_information.Column5 IS '扩展字段5';


--创建序列
drop sequence seq_t_information;
create sequence seq_t_information
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;


--日志信息表(id、方法名、入参、出参、用户id、手机号、时间、请求的ip)
drop table t_logInfo;
create table t_logInfo(
  id            number(10) primary key,          
  methName      varchar2(50) not null,           
  parames_in      varchar2(200) ,  
  parames_out        varchar2(500),
  userId        number(10),
  phone        varchar2(12),
  ip           varchar2(50),
  addTime       varchar2(22) not null,
  Column1      varchar2(10),
  Column2      varchar2(10),
  Column3      varchar2(10),
  Column4      varchar2(10),
  Column5      varchar2(10)
);

COMMENT ON COLUMN t_logInfo.id IS '消息id,主键自增长';
COMMENT ON COLUMN t_logInfo.methName IS '方法名';
COMMENT ON COLUMN t_logInfo.parames_in IS '输入参数';
COMMENT ON COLUMN t_logInfo.parames_out IS '输出';
COMMENT ON COLUMN t_logInfo.userId IS '用户id';
COMMENT ON COLUMN t_logInfo.phone IS '用户手机';
COMMENT ON COLUMN t_logInfo.ip IS '请求ip';
COMMENT ON COLUMN t_logInfo.addTime IS '操作时间';
COMMENT ON COLUMN t_logInfo.Column1 IS '扩展字段1';
COMMENT ON COLUMN t_logInfo.Column2 IS '扩展字段2';
COMMENT ON COLUMN t_logInfo.Column3 IS '扩展字段3';
COMMENT ON COLUMN t_logInfo.Column4 IS '扩展字段4';
COMMENT ON COLUMN t_logInfo.Column5 IS '扩展字段5';


--创建序列
drop sequence seq_t_logInfo;
create sequence seq_t_logInfo
  minvalue 1
  maxvalue 2140000000000
  start with 1
  increment by 1
  cache 20;