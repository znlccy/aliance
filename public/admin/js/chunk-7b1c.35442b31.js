(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-7b1c"],{"0246":function(t,e,a){},"3f4c":function(t,e,a){"use strict";a.d(e,"a",function(){return m});var i=a("c665"),l=a("dc0a"),s=a("aa9a"),r=a("d328"),o=a("11d9"),c=a("b8d7"),n=a("4a2d"),m=function(t){function e(){return Object(i["a"])(this,e),Object(r["a"])(this,Object(o["a"])(e).apply(this,arguments))}return Object(s["a"])(e,null,[{key:"entry",value:function(t,a,i){Object(c["a"])(Object(o["a"])(e),"request",this).call(this,this.uri()+"entry",a,i,t)}},{key:"save",value:function(t,a,i){Object(c["a"])(Object(o["a"])(e),"request",this).call(this,this.uri()+"save",a,i,t)}},{key:"applyList",value:function(t,a,i){Object(c["a"])(Object(o["a"])(e),"request",this).call(this,this.uri()+"apply_entry",a,i,t)}},{key:"detail",value:function(t,a,i){Object(c["a"])(Object(o["a"])(e),"request",this).call(this,this.uri()+"detail",a,i,t)}},{key:"delete",value:function(t,a,i){Object(c["a"])(Object(o["a"])(e),"request",this).call(this,this.uri()+"delete",a,i,t)}},{key:"check",value:function(t,a,i){Object(c["a"])(Object(o["a"])(e),"request",this).call(this,this.uri()+"auditor",a,i,t)}},{key:"uri",value:function(){return Object(c["a"])(Object(o["a"])(e),"url",this).call(this)+"activity/"}}]),Object(l["a"])(e,t),e}(n["a"])},d5b2:function(t,e,a){"use strict";var i=a("0246"),l=a.n(i);l.a},f91e:function(t,e,a){"use strict";a.r(e);var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"pages"},[a("H3",[t._v("基础信息")]),a("div",{staticClass:"line"}),a("el-form",{ref:"form",staticClass:"form",attrs:{model:t.form,"label-width":"120px"}},[a("el-form-item",{attrs:{label:"活动名称"}},[a("el-input",{staticStyle:{width:"500px"},attrs:{placeholder:"请输入"},model:{value:t.form.title,callback:function(e){t.$set(t.form,"title",e)},expression:"form.title"}})],1),a("el-form-item",{attrs:{label:"报名时间"}},[a("el-date-picker",{staticStyle:{width:"500px"},attrs:{type:"datetimerange","range-separator":"至","value-format":"yyyy-MM-dd HH:mm:ss","start-placeholder":"开始日期","end-placeholder":"结束日期"},model:{value:t.applyTimes,callback:function(e){t.applyTimes=e},expression:"applyTimes"}})],1),a("el-form-item",{attrs:{label:"活动时间"}},[a("el-date-picker",{attrs:{type:"datetime","value-format":"yyyy-MM-dd HH:mm:ss",placeholder:"选择日期"},model:{value:t.form.apply_time,callback:function(e){t.$set(t.form,"apply_time",e)},expression:"form.apply_time"}})],1),a("el-form-item",{attrs:{label:"活动地址"}},[a("el-input",{staticStyle:{width:"300px"},attrs:{placeholder:"请输入"},model:{value:t.form.address,callback:function(e){t.$set(t.form,"address",e)},expression:"form.address"}})],1),a("el-form-item",{attrs:{label:"活动详细地址"}},[a("el-input",{staticStyle:{width:"300px"},attrs:{placeholder:"请输入"},model:{value:t.form.location,callback:function(e){t.$set(t.form,"location",e)},expression:"form.location"}})],1),a("el-form-item",{attrs:{label:"人数上限制"}},[a("el-input-number",{attrs:{min:0,"controls-position":"right"},model:{value:t.form.limit,callback:function(e){t.$set(t.form,"limit",e)},expression:"form.limit"}}),a("span",{staticClass:"hint"},[t._v("0 为无限制")])],1),a("el-form-item",{attrs:{label:"封面图"}},[a("image-select",{attrs:{url:t.form.picture},model:{value:t.img,callback:function(e){t.img=e},expression:"img"}})],1),a("el-form-item",{attrs:{label:"活动简介"}},[a("el-input",{staticStyle:{width:"400px"},attrs:{type:"textarea",rows:5,placeholder:"请输入"},model:{value:t.form.content,callback:function(e){t.$set(t.form,"content",e)},expression:"form.content"}})],1),a("el-form-item",{attrs:{label:"推荐"}},[a("el-select",{staticClass:"header-col-select",attrs:{placeholder:"请选择"},model:{value:t.form.recommend,callback:function(e){t.$set(t.form,"recommend",e)},expression:"form.recommend"}},[a("el-option",{attrs:{value:1,label:"是"}}),a("el-option",{attrs:{value:0,label:"否"}})],1)],1),a("el-form-item",{attrs:{label:"状态"}},[a("el-select",{staticClass:"header-col-select",attrs:{placeholder:"请选择"},model:{value:t.form.status,callback:function(e){t.$set(t.form,"status",e)},expression:"form.status"}},[a("el-option",{attrs:{value:1,label:"启用"}}),a("el-option",{attrs:{value:0,label:"禁用"}})],1)],1),a("el-form-item",{attrs:{label:"审核方式"}},[a("el-select",{staticClass:"header-col-select",attrs:{placeholder:"请选择"},model:{value:t.form.audit_method,callback:function(e){t.$set(t.form,"audit_method",e)},expression:"form.audit_method"}},[a("el-option",{attrs:{value:1,label:"无需审核"}}),a("el-option",{attrs:{value:0,label:"人工审核"}})],1)],1),a("div",[a("rich-view",{model:{value:t.form.rich_text,callback:function(e){t.$set(t.form,"rich_text",e)},expression:"form.rich_text"}})],1),a("el-form-item",{staticStyle:{"margin-top":"100px"}},[a("el-button",{staticStyle:{"margin-left":"50px"},attrs:{type:"primary",loading:t.isLoading},on:{click:t.onSubmit}},[t._v("提交\n            ")]),a("el-button",{on:{click:t.back}},[t._v("返回")])],1)],1)],1)},l=[],s=a("3f4c"),r={data:function(){return{imageUrl:"",form:{recommend:0,audit_method:0,limit:0},isLoading:!1,applyTimes:[],roles:{account:[{required:!0,message:"请输入账号",trigger:"blur"},{min:6,max:12,message:"长度在 6 到 12 个字符",trigger:"blur"}]},img:null}},mounted:function(){void 0!==this.$route.query.id?(this.isNoEdit=!0,this.loadData()):this.isNoEdit=!1},methods:{loadData:function(){var t=this;s["a"].detail({id:this.$route.query.id},function(e){t.form=e.data.data,t.applyTimes=[t.form.begin_time,t.form.end_time]})},edit:function(){this.isNoEdit=!1},onSubmit:function(){var t=this;if(s["a"].isStrValid(this.form.title))if(s["a"].isStrValid(this.form.apply_time))if(2===this.applyTimes.length)if(this.form.begin_time=this.applyTimes[0],this.form.end_time=this.applyTimes[1],s["a"].isStrValid(this.form.address))if(s["a"].isStrValid(this.form.location))if(null!=this.img||null!=this.form.picture){var e=s["a"].objToFormData(this.form);e.append("picture",this.img),this.isLoading=!0,s["a"].save(e,function(e){t.isLoading=!1,t.$message.success(e.data.message),t.$router.push({name:"activity"}),t.$route.meta.keepAlive=!1},function(){t.isLoading=!1})}else this.$message.error("请选择图片");else this.$message.error("请输入活动详细地址 ");else this.$message.error("请输入活动地址 ");else this.$message.error("请选择报名时间");else this.$message.error("请选择活动日期");else this.$message.error("请输入活动名称")},back:function(){this.$router.back()}}},o=r,c=(a("d5b2"),a("2877")),n=Object(c["a"])(o,i,l,!1,null,"572f01ec",null);n.options.__file="activeAdd.vue";e["default"]=n.exports}}]);
//# sourceMappingURL=chunk-7b1c.35442b31.js.map