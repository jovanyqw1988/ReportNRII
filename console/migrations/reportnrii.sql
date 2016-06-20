-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema reportnrii
-- -----------------------------------------------------
-- Report NRII  上报平台  项目数据库

-- -----------------------------------------------------
-- Schema reportnrii
--
-- Report NRII  上报平台  项目数据库
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `reportnrii` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema reportnrii
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema reportnrii
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `reportnrii` DEFAULT CHARACTER SET utf8 ;
USE `reportnrii` ;

-- -----------------------------------------------------
-- Table `reportnrii`.`rnrii_accound_group`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reportnrii`.`rnrii_accound_group` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NULL,
  `desc` TEXT(200) NULL,
  `status` TINYINT(1) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reportnrii`.`rnrii_accound`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reportnrii`.`rnrii_accound` (
  `accound` VARCHAR(20) NOT NULL COMMENT 'ReportRNII平台的账户',
  `password` VARCHAR(32) NULL COMMENT 'ReportNRII平台的登录密码，使用MD5加密处理，32位',
  `group` INT NULL COMMENT '用户组，当此项为Null时，说明此用户为超级用户',
  `db_type` VARCHAR(20) NULL COMMENT '数据库类型',
  `db_host` VARCHAR(30) NULL COMMENT '连接地址',
  `db_port` VARCHAR(6) NULL COMMENT '端口号',
  `db_name` VARCHAR(45) NULL COMMENT '数据库全名',
  `db_params` VARCHAR(45) NULL COMMENT '数据库连接参数，例：useUnicode=true&characterEncoding=gbk',
  `db_user` VARCHAR(45) NULL COMMENT '数据库连接用户名',
  `db_password` VARCHAR(45) NULL COMMENT '数据库连接密码',
  PRIMARY KEY (`accound`),
  INDEX `fk_rnrii_accound_rnrii_accound_group_idx` (`group` ASC),
  CONSTRAINT `fk_rnrii_accound_rnrii_accound_group`
    FOREIGN KEY (`group`)
    REFERENCES `reportnrii`.`rnrii_accound_group` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reportnrii`.`rnrii_permission`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reportnrii`.`rnrii_permission` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `desc` TEXT(200) NULL,
  `parant` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reportnrii`.`rnrii_group_has_permission`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reportnrii`.`rnrii_group_has_permission` (
  `group` INT NOT NULL,
  `permission` INT NOT NULL,
  PRIMARY KEY (`group`, `permission`),
  INDEX `fk_rnrii_accound_group_has_rnrii_permission_rnrii_permissio_idx` (`permission` ASC),
  INDEX `fk_rnrii_accound_group_has_rnrii_permission_rnrii_accound_g_idx` (`group` ASC),
  CONSTRAINT `fk_rnrii_accound_group_has_rnrii_permission_rnrii_accound_gro1`
    FOREIGN KEY (`group`)
    REFERENCES `reportnrii`.`rnrii_accound_group` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rnrii_accound_group_has_rnrii_permission_rnrii_permission1`
    FOREIGN KEY (`permission`)
    REFERENCES `reportnrii`.`rnrii_permission` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reportnrii`.`rnrii_instrument_config`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reportnrii`.`rnrii_instrument_config` (
  `type` TINYINT(1) NOT NULL,
  `accound` VARCHAR(20) NOT NULL,
  `sql` TEXT(500) NULL,
  `sql_fields` TEXT(500) NULL,
  `sql_pages` VARCHAR(45) NULL,
  PRIMARY KEY (`type`, `accound`),
  INDEX `fk_rnrii_instrument_config_rnrii_accound1_idx` (`accound` ASC),
  CONSTRAINT `fk_rnrii_instrument_config_rnrii_accound1`
    FOREIGN KEY (`accound`)
    REFERENCES `reportnrii`.`rnrii_accound` (`accound`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reportnrii`.`rnrii_remote_field`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reportnrii`.`rnrii_remote_field` (
  `account` VARCHAR(20) NOT NULL,
  `type` TINYINT(1) NOT NULL,
  `field` VARCHAR(45) NOT NULL,
  `remote_field` VARCHAR(45) NULL,
  `is_index` TINYINT(1) NULL,
  PRIMARY KEY (`field`, `type`, `account`),
  INDEX `fk_rnrii_field_map_rnrii_instrument_config1_idx` (`type` ASC, `account` ASC),
  CONSTRAINT `fk_rnrii_field_map_rnrii_instrument_config1`
    FOREIGN KEY (`type` , `account`)
    REFERENCES `reportnrii`.`rnrii_instrument_config` (`type` , `accound`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reportnrii`.`rnrii_inscode`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reportnrii`.`rnrii_inscode` (
  `insCode` VARCHAR(45) NOT NULL,
  `client_id` VARCHAR(45) NULL,
  `client_secret` VARCHAR(45) NULL,
  `redirect_uri` VARCHAR(45) NULL,
  `submittedRates` VARCHAR(45) NULL COMMENT '科研设施与仪器入网比例	指该管理单位在国家网络管理平台注册填报的科研设施与仪器占符合申报条件的全部科研设施与仪器的比例，体现了纳入国家网络管理平台的情况',
  `activatedRates` VARCHAR(45) NULL COMMENT '正常运行设备比例	纳入国家网络管理平台的科研设施与仪器正常运行的数量占纳入的全部科研设施与仪器数量的比例',
  `totalShareRates` VARCHAR(45) NULL COMMENT '参与共享比例	指参与共享（包括内部共享和外部共享两种方式）的科研设施与仪器和全部符合共享条件科研设施与仪器的数量之比，体现了总体开放共享服务的情况',
  `externalShareRates` VARCHAR(45) NULL COMMENT '外部共享比例	指提供对外服务的科研设施与仪器占全部符合共享条件的科研设施与仪器的比例，体现了对外开放共享服务的比例情况',
  `Innovation` VARCHAR(45) NULL COMMENT '仪器创新开发	管理单位仪器功能开发、新技术和新方法的研究、仪器设备功能的升级改造、仪器研究能力、科研设施与仪器自主创新研发能力的情况及数量（最多500字）',
  `serviceAmounts` VARCHAR(45) NULL COMMENT '服务总量	科研设施与仪器对外提供服务的总量，根据仪器类型和服务方式的不同，包括设备机时服务、样品测试数量、分析检测服务、培训等（最多200字）',
  `user` VARCHAR(45) NULL COMMENT '用户类型及数量	科研设施与仪器服务用户的类型及数量（单位：人/次）',
  `Project` VARCHAR(200) NULL COMMENT '支撑项目	科研设施与仪器对外服务，用户完成的各种科研项目或合作项目数的数量，特别是服务各级各类科技计划（专项、基金、重大工程）等情况（最多200字）',
  `Thesis` VARCHAR(200) NULL COMMENT '支撑论文	用户利用科研设施与仪器所产生的论文数量，包括已公开发表的论文，或者尚未正式发表但已被录用的论文，特别是在三大检索SCI、EI、ISTP发表的论文，最多200字',
  `Book` VARCHAR(200) NULL COMMENT '支撑论著	用户利用科研设施与仪器所产生的论著或专著数量（最多200字）',
  `Report` VARCHAR(200) NULL COMMENT '支撑科技报告	用户利用科研设施与仪器所产生的科技报告数量（最多200字）',
  `Patent` VARCHAR(200) NULL COMMENT '支撑发明专利	用户利用科研设施与仪器所产生的发明专利的数量，指已授权发明专利数，不含实用新型和外观设计（最多200字）',
  `Output` VARCHAR(200) NULL COMMENT '产出科学数据	用户使用科研设施与仪器过程中产生的原始数据及研究分析数据，包括调查观测、测试化验、实验研究等相关科学数据（最多200字）',
  `Achievements` VARCHAR(200) NULL COMMENT '科技成果及获奖情况	使用科研设施与仪器产生的科技成果及获奖成果数量（最多200字）',
  `serviceIncome` VARCHAR(45) NULL COMMENT '对外服务收入	管理单位科研设施与仪器对外服务获得的收入，以人民币计算（单位万元，保留小数点后两位）。包括科研设施与仪器对外提供服务收入的测试费、租赁收入和其他服务收入等',
  `socialBenefit` VARCHAR(200) NULL COMMENT '社会效益	科研设施与仪器对外开放共享所产生的社会效益，如服务重大工程、企业创新、服务民生、应急事件、科学普及、政府决策、其他等情况（最多500字）',
  `Remark` VARCHAR(200) NULL COMMENT '其他成果	非上述成果之外的成果（最多200字）',
  PRIMARY KEY (`insCode`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reportnrii`.`rnrii_instrument`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reportnrii`.`rnrii_instrument` (
  `insCode` VARCHAR(45) NOT NULL,
  `innerId` VARCHAR(45) NOT NULL COMMENT '所在单位仪器内部编码	仪器所在单位系统内部id，能唯一标识仪器',
  `instrument` TINYINT(1) NULL COMMENT '填报数据类型\n1代表科学仪器中心\n2代表大型科学装置\n3代表科学仪器服务单元\n4代表单台套科学仪器设备\n5代表海关监管信息\n6代表服务记录',
  `canme` VARCHAR(50) NULL COMMENT '仪器中心名称	科学仪器中心全称，不可简写（最多50字）',
  `ename` VARCHAR(100) NULL,
  `instrBelongsType` VARCHAR(45) NULL COMMENT '所属大型科学装置/仪器中心/服务单元	仪器设备所隶属的科学仪器中心（1）、大型科学装置（2）或服务单元（3）（无隶属关系可填写“无”）',
  `InstrBelongsName` VARCHAR(45) NULL COMMENT '隶属仪器所在单位仪器内部编号	确定隶属大型科学装置/仪器中心/服务单元唯一的一台仪器。（无隶属关系可填写“无”）',
  `instrCategory` VARCHAR(6) NULL COMMENT '设备分类编码	依据“大型科学仪器设备资源的建设与整合”平台建设项目的《大型科学仪器设备分类标准与编码规则（试用）》，按大类、中类、小类选择填写（6位数字代码）',
  `instrSource` VARCHAR(10) NULL COMMENT '仪器设备来源	购置、研制、赠送、其他',
  `instrSupervise` VARCHAR(10) NULL COMMENT '海关监管情况	仪器是否被海关监管，若仪器被海关监管，填写“是”，若仪器不被海关监管，填写“否”',
  `level` VARCHAR(10) NULL COMMENT '仪器中心级别	国家级、省部级、地市级或单位级等（单选，以所属最高级别为准）',
  `url` VARCHAR(100) NULL,
  `worth` FLOAT NULL COMMENT '原值	科学装置的购置单价或研制成本，按资产登记价格填写。国产科学装置以人民币填报，进口科学装置根据建账时的汇率折合成人民币计算（单位为万元，保留2位小数），优惠价及赠送仪器按市场价或资产登记价格填写',
  `establish` DATE NULL,
  `nation` VARCHAR(45) NULL COMMENT '产地国别	科学装置的实际制造地所在国家或地区，按国家标准《世界各国和地区名称代码》（GB/T 2659-2000）选择填写，自主研发的填写中国；国家简称',
  `manufacturer` VARCHAR(100) NULL COMMENT '生产制造商	仪器设备生产或设计制造单位的全称（非代理商），自主研发需填写本单位（最多100字）',
  `beginDate` DATE NULL COMMENT '启用日期	科学装置投入使用的日期（按YYYY-MM-DD格式填写）',
  `type` VARCHAR(10) NULL COMMENT '科学仪器中心类别	通用或专用',
  `instrVersion` VARCHAR(100) NULL COMMENT '规格型号	按仪器设备生产制造厂商的标识填写（最多100字）',
  `technical` TEXT(500) NULL COMMENT '主要线站与仪器设备及技术指标	构成科学装置的核心线站、主要仪器设备的名称、型号以及能代表仪器设备主要技术性能的指标或参数 （最多500字）',
  `function` TEXT(300) NULL COMMENT '主要功能	对科学装置主要功能的简要介绍（最多300个字）',
  `subject` VARCHAR(200) NULL COMMENT '主要学科领域	按国家标准《学科分类与代码》（GB/T 13745-2009）选择填写仪器中心支持科技活动的主要学科名称，涉及多个学科领域的可多选（最多4个）（一级学科）\n如：化学，物理学',
  `serviceContent` VARCHAR(200) NULL COMMENT '服务内容	科学仪器中心提供的各类服务项目描述，如样品测试、分析检测、技术咨询、认证服务等（最多200字）\n',
  `achievement` TEXT(45) NULL COMMENT '服务的典型成果	列举该科学仪器中心面向社会提供服务、支撑重大项目或主要成果的典型案例（1-3个，没有可填写无）、（最多500字）',
  `status` VARCHAR(10) NULL COMMENT '运行状态	指科学装置当年通常技术性能状态，按正常、待机、远程服务中、偶有故障、故障频繁、待修、待报废选择填写（单选）。按科学装置当年一般状况下的运行状态填写，并非填报时的特定状态',
  `requirement` TEXT(500) NULL COMMENT '对外开放共享规定	用户申请条件、申请方式、申请时间、申请流程、申请材料、服务时间安排等的方面的要求（最多500字）',
  `fee` TEXT(500) NULL COMMENT '参考收费标准	对外开放相关收费标准，为用户提供服务时收取的费用，按照单位已有收费标准填写。是对仪器中心现有收费标准的概述，无需精确到每台仪器（最多500字）',
  `serviceUrl` VARCHAR(150) NULL COMMENT '预约服务网址	管理单位在线服务平台提供的用户在线预约获取服务接口的URL，能够实现对本仪器中心仪器的预约申请（最多150字）',
  `province` VARCHAR(45) NULL COMMENT '科学装置所在的详细地理位置（最多100字），标准格式：\n省（自治区、直辖市）、\n市、\n区（县）、\n街道（乡镇，需包括街道/乡镇门牌号）',
  `city` VARCHAR(45) NULL COMMENT '科学装置所在的详细地理位置（最多100字），标准格式：\n省（自治区、直辖市）、\n市、\n区（县）、\n街道（乡镇，需包括街道/乡镇门牌号）',
  `county` VARCHAR(45) NULL COMMENT '科学装置所在的详细地理位置（最多100字），标准格式：\n省（自治区、直辖市）、\n市、\n区（县）、\n街道（乡镇，需包括街道/乡镇门牌号）',
  `street` VARCHAR(45) NULL COMMENT '科学装置所在的详细地理位置（最多100字），标准格式：\n省（自治区、直辖市）、\n市、\n区（县）、\n街道（乡镇，需包括街道/乡镇门牌号）',
  `contact` VARCHAR(20) NULL COMMENT '联系人	联系人姓名（最多20字）',
  `phone` VARCHAR(20) NULL COMMENT '电话	联系人的电话号码，座机（加区号）或手机，以联系人座机为主，一个电话号码即可',
  `email` VARCHAR(50) NULL COMMENT '电子邮箱	联系人的电子邮箱（最多50字）',
  `address` VARCHAR(100) NULL COMMENT '通讯地址	联系人的办公地址，标准格式：省（自治区、直辖市）、市、区（县）、街道（乡镇）（最多100字）',
  `postalcode` VARCHAR(6) NULL COMMENT '邮政编码	联系人办公地址的邮政编码，6位',
  `shareMode` TINYINT(1) NULL COMMENT '共享模式	内部共享、外部共享、不共享',
  `image` VARCHAR(150) NULL COMMENT '仪器中心图片	科学仪器中心图片对应的URL（外网可以访问的图片url），图片要求1M字节以内，jpg格式',
  `auditStatus` VARCHAR(2) NULL COMMENT '提交状态：-1或0\n-1未提交，代表后期需要对数据进行重复报，更新完善数据；\n0提交，代表报送的数据无误，后期无需更新完善。已经提交的数据，再次推送更新无效，需等待后期审核驳回再进行修改。\n如果因为失误提交，请等待国家平台审核驳回后更新。',
  PRIMARY KEY (`innerId`, `insCode`),
  INDEX `fk_rnrii_instrument_rnrii_inscode1_idx` (`insCode` ASC),
  CONSTRAINT `fk_rnrii_instrument_rnrii_inscode1`
    FOREIGN KEY (`insCode`)
    REFERENCES `reportnrii`.`rnrii_inscode` (`insCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reportnrii`.`rnrii_customs_supervision`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reportnrii`.`rnrii_customs_supervision` (
  `insCode` VARCHAR(45) NOT NULL,
  `innerId` VARCHAR(45) NOT NULL,
  `codeCpd` VARCHAR(12) NULL COMMENT '征免税证明编号	长度12位：固定位（5位）+年份（2位）+随机（5位），按《中华人民共和国进出口货物征免税证明表》（以下简称征免税证明表）中的编号填写',
  `numberCpd` VARCHAR(45) NULL COMMENT '征免税证明序号	若多个货物同时申报免税，根据在征免税证明表中货物序号排列，填写对应的序号',
  `declarationNumber` VARCHAR(18) NULL COMMENT '进口报关单编号	长度18位：海关编号（4位）+年份（4位）+进口标志（1位）+随机（9位），按征免税证明表填写',
  `contractNumber` VARCHAR(50) NULL COMMENT '合同号	按征免税证明表填写（最多50字）',
  `importPort` VARCHAR(50) NULL COMMENT '进口口岸	按征免税证明表填写（最多50字）',
  `responsibleCustoms` VARCHAR(50) NULL COMMENT '主管海关	按征免税证明表填写（最多50字）',
  `importDate` DATE NULL COMMENT '进口日期	按征免税证明表填写',
  `Share` VARCHAR(10) NULL COMMENT '申报共享标志	已申报共享，填写“是”，未申报共享，填写“否”',
  `feesApproved` VARCHAR(10) NULL COMMENT '收费标准已评议标志	收费标准已评议，填写“是”，未评议，填写“否” ',
  `hsCode` VARCHAR(50) NULL COMMENT 'HS编码（税号）	按征免税证明表填写（最多50字）',
  `Record` VARCHAR(200) NULL COMMENT '后续管理记录	仪器的后续管理记录信息（最多200个字）',
  `auditStatus` VARCHAR(2) NULL COMMENT '提交状态：-1或0\n-1未提交，代表后期需要对数据进行重复报，更新完善数据；\n0提交，代表报送的数据无误，后期无需更新完善。已经提交的数据，再次推送更新无效，需等待后期审核驳回再进行修改。\n如果因为失误提交，请等待国家平台审核驳回后更新。',
  PRIMARY KEY (`insCode`, `innerId`),
  INDEX `fk_rnrii_customs_supervision_rnrii_inscode1_idx` (`insCode` ASC),
  CONSTRAINT `fk_rnrii_customs_supervision_rnrii_inscode1`
    FOREIGN KEY (`insCode`)
    REFERENCES `reportnrii`.`rnrii_inscode` (`insCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reportnrii`.`rnrii_service_record`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reportnrii`.`rnrii_service_record` (
  `insCode` VARCHAR(45) NOT NULL,
  `innerId` VARCHAR(45) NOT NULL COMMENT '所在单位仪器内部编号	管理单位资产管理部门赋予该仪器设备唯一编号',
  `amounts` FLOAT NULL COMMENT '服务金额	实际服务的总额，以元为单位',
  `serviceTime` VARCHAR(45) NULL COMMENT '实际服务时间	科研设施与仪器向用户实际提供服务的日期或时间段',
  `serviceContent` VARCHAR(200) NULL COMMENT '实际服务内容	科研设施与仪器向用户实际提供的服务项目，如样品测试、分析检测等，最多200字',
  `serviceWay` VARCHAR(15) NULL COMMENT '服务方式	一是占用共享，即服务客体(需求者)按一定规程自行操作使用；二是技术共享，即在服务主体的技术指导下，服务客体有限度地自主使用操作仪器设备；三是委托共享，即受服务客体委托，由服务主体按要求启动和运行仪器设备，并向委托方提交相应结果；四是远程共享；五是其他（可多选）',
  `serviceAmount` VARCHAR(10) NULL COMMENT '服务量	根据订单，科研设施与仪器所提供的服务量，根据仪器类型和服务方式的不同，可按所占用的时长或次数（包含必要开机准备时间、测试时间和必须的后处理时间，不包括空载运行的时间，计量单位为小时）、样品测试数量、分析检测数量、技术指导次数等该领域统计方法计算。',
  `subjectName` VARCHAR(45) NULL COMMENT '课题名称	用户利用科研设施与仪器所支撑的课题名称（没有则填写“无”）',
  `subjectIncome` VARCHAR(45) NULL COMMENT '课题经费来源	课题最主要的经费来源，可多选（最多4个）：\nA 国家重大科技专项；B 国家自然科学基金；C 863计划；D 国家科技支撑（攻关）计划；E 火炬计划；F 星火计划；G 973计划；H 211工程；I 985工程；J 公益性行业科研专项；K 国家社会科学基金；L 国家科技基础性工作专项；M 科技基础条件平台专项；N 除上述国家计划外由中央政府部门下达的课题；O 地方科技计划项目；P 其他\n例：863计划',
  `subjectArea` VARCHAR(45) NULL COMMENT '课题主要学科领域	用户申请机时进行研究的课题所属的主要学科领域，按国家标准《学科分类与代码》（GB/T 13745-2009）选择填写主要学科名称，涉及多个学科领域的可多选（最多4个，一级学科）\n力学，数学,化学',
  `subjectContent` VARCHAR(200) NULL COMMENT '课题研究内容	用户利用科研设施与仪器所研究的课题的基本内容概述（最多200字）（没有则填写“无”）',
  `applicant` VARCHAR(20) NULL COMMENT '申请人	申请人的姓名（最多20字）',
  `applicatPhone` VARCHAR(20) NULL COMMENT '申请人电话	申请人的电话号码，座机（加区号）或手机（最多20字）以座机为主',
  `applicatEmail` VARCHAR(50) NULL COMMENT '申请人电子邮箱	申请人的电子邮箱（最多50字）',
  `applicatUnit` VARCHAR(50) NULL,
  `comment` VARCHAR(10) NULL COMMENT '用户评价及意见	用户对本次服务的评价，非常满意、基本满意、一般、不满意、极差（单选）。具体的意见和建议',
  `auditStatus` VARCHAR(2) NULL COMMENT '提交状态：-1或0\n-1未提交，代表后期需要对数据进行重复报，更新完善数据；\n0提交，代表报送的数据无误，后期无需更新完善。已经提交的数据，再次推送更新无效，需等待后期审核驳回再进行修改。\n如果因为失误提交，请等待国家平台审核驳回后更新。',
  PRIMARY KEY (`insCode`, `innerId`),
  INDEX `fk_rnrii_service_record_rnrii_inscode1_idx` (`insCode` ASC),
  CONSTRAINT `fk_rnrii_service_record_rnrii_inscode1`
    FOREIGN KEY (`insCode`)
    REFERENCES `reportnrii`.`rnrii_inscode` (`insCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reportnrii`.`rnrii_accound_has_inscode`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reportnrii`.`rnrii_accound_has_inscode` (
  `accound` VARCHAR(20) NOT NULL,
  `insCode` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`accound`, `insCode`),
  INDEX `fk_rnrii_accound_has_rnrii_inscode_rnrii_inscode1_idx` (`insCode` ASC),
  INDEX `fk_rnrii_accound_has_rnrii_inscode_rnrii_accound1_idx` (`accound` ASC),
  CONSTRAINT `fk_rnrii_accound_has_rnrii_inscode_rnrii_accound1`
    FOREIGN KEY (`accound`)
    REFERENCES `reportnrii`.`rnrii_accound` (`accound`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rnrii_accound_has_rnrii_inscode_rnrii_inscode1`
    FOREIGN KEY (`insCode`)
    REFERENCES `reportnrii`.`rnrii_inscode` (`insCode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `reportnrii` ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
