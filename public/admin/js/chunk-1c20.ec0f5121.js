(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-1c20"],{"1bd7":function(t,e,a){"use strict";var i=a("6452"),s=a.n(i);s.a},"20d2":function(t,e,a){"use strict";a.r(e);var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"pages"},[a("H3",[t._v("基础信息")]),a("div",{staticClass:"line"}),a("el-form",{ref:"form",staticClass:"form",attrs:{model:t.form,"label-width":"120px"}},[a("el-form-item",{attrs:{label:"名称"}},[a("el-input",{staticStyle:{width:"500px"},attrs:{placeholder:"请输入"},model:{value:t.form.name,callback:function(e){t.$set(t.form,"name",e)},expression:"form.name"}})],1),a("el-form-item",{attrs:{label:"状态"}},[a("el-select",{attrs:{placeholder:"请选择"},model:{value:t.form.status,callback:function(e){t.$set(t.form,"status",e)},expression:"form.status"}},[a("el-option",{attrs:{label:"启用",value:1}}),a("el-option",{attrs:{label:"不启用",value:0}})],1)],1),a("el-form-item",{attrs:{label:"创建时间"}},[a("el-date-picker",{attrs:{type:"date",placeholder:"选择日期"},model:{value:t.form.create_time,callback:function(e){t.$set(t.form,"create_time",e)},expression:"form.create_time"}})],1),a("el-form-item",{attrs:{label:"更新时间"}},[a("el-date-picker",{attrs:{type:"date",placeholder:"选择日期"},model:{value:t.form.update_time,callback:function(e){t.$set(t.form,"update_time",e)},expression:"form.update_time"}})],1),a("el-form-item",{staticStyle:{"margin-top":"100px"}},[a("el-button",{staticStyle:{"margin-left":"50px"},attrs:{type:"primary",loading:t.isLoading},on:{click:t.onSubmit}},[t._v("提交\n            ")]),a("el-button",{on:{click:t.back}},[t._v("返回")])],1)],1)],1)},s=[],l=(a("7f7f"),a("3454")),r={data:function(){return{imageUrl:"",form:{id:null,name:null,description:null,price:null,recommend:null,status:null,address:null,rich_text:null,category_id:null},img:null,isNoEdit:!0,isLoading:!1,options:[]}},mounted:function(){this.init()},methods:{init:function(){void 0!==this.$route.query.id?(this.isNoEdit=!0,this.loadData()):this.isNoEdit=!1},loadData:function(){var t=this;l["a"].detail({id:this.$route.query.id},function(e){t.form=e.data.data})},edit:function(){this.isNoEdit=!1},onSubmit:function(){var t=this;if(l["a"].isStrValid(this.form.name))if(l["a"].isStrValid(this.form.status))if(l["a"].isStrValid(this.form.create_time))if(l["a"].isStrValid(this.form.update_time)){var e=l["a"].objToFormData(this.form);this.isLoading=!0,l["a"].save(e,function(){t.isLoading=!1,t.$message.success("保存成功!"),t.$router.push({name:"category"}),t.$route.meta.keepAlive=!1})}else this.$message.error("请选择更新时间");else this.$message.error("请选择创建时间");else this.$message.error("请选择状态");else this.$message.error("请输入名称")},back:function(){this.$router.back()}}},o=r,n=(a("1bd7"),a("2877")),c=Object(n["a"])(o,i,s,!1,null,"00fd5657",null);c.options.__file="categoryEdit.vue";e["default"]=c.exports},3454:function(t,e,a){"use strict";a.d(e,"a",function(){return u});var i=a("c665"),s=a("dc0a"),l=a("aa9a"),r=a("d328"),o=a("11d9"),n=a("b8d7"),c=a("4a2d"),u=function(t){function e(){return Object(i["a"])(this,e),Object(r["a"])(this,Object(o["a"])(e).apply(this,arguments))}return Object(l["a"])(e,null,[{key:"index",value:function(t,a,i){Object(n["a"])(Object(o["a"])(e),"request",this).call(this,this.uri()+"entry",a,i,t)}},{key:"save",value:function(t,a,i){Object(n["a"])(Object(o["a"])(e),"request",this).call(this,this.uri()+"save",a,i,t)}},{key:"detail",value:function(t,a,i){Object(n["a"])(Object(o["a"])(e),"request",this).call(this,this.uri()+"detail",a,i,t)}},{key:"delete",value:function(t,a,i){Object(n["a"])(Object(o["a"])(e),"request",this).call(this,this.uri()+"delete",a,i,t)}},{key:"uri",value:function(){return Object(n["a"])(Object(o["a"])(e),"url",this).call(this)+"category/"}}]),Object(s["a"])(e,t),e}(c["a"])},6452:function(t,e,a){}}]);
//# sourceMappingURL=chunk-1c20.ec0f5121.js.map