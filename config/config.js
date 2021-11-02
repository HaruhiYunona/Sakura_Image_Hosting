function config(name) {
    var config = new Array();
    config['name'] = "Narori樱花图床"; //站点名称
    config['limit'] = 10485760; //字元数，即B。默认10MB（10485760B）
    config['site'] = "https://domain.com/pic"; //图片直连提供的文件位置，不包含文件名
    return config[name];
}