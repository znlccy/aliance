(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-04dd"],{"4ac7":function(t,e,i){"use strict";var n=i("f3af"),a=i.n(n);a.a},8310:function(t,e,i){"use strict";i.r(e);var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"pages"},[i("H3",[t._v("基础信息")]),i("div",{staticClass:"line"}),i("el-form",{ref:"form",staticClass:"form",attrs:{model:t.form,"label-width":"120px"}},[i("el-row",[i("el-form-item",{attrs:{label:"分组名称"}},[i("el-input",{attrs:{placeholder:"请输入"},model:{value:t.form.name,callback:function(e){t.$set(t.form,"name",e)},expression:"form.name"}})],1),i("el-form-item",{attrs:{label:"分组排序"}},[i("el-input",{attrs:{type:"number",placeholder:"请输入"},model:{value:t.form.sort,callback:function(e){t.$set(t.form,"sort",e)},expression:"form.sort"}})],1)],1),i("el-form-item",[i("el-button",{attrs:{type:"primary",loading:t.isLoading},on:{click:t.onSubmit}},[t._v("提交")]),i("el-button",{on:{click:t.back}},[t._v("返回")])],1)],1)],1)},a=[],o=i("e03f"),r={data:function(){return{form:{name:"",sort:null},industry:[],role:[],isLoading:!1,accountIsEdit:!1}},mounted:function(){this.init()},methods:{init:function(){void 0!==this.$route.query.id&&this.loadData()},onSubmit:function(){var t=this;this.isLoading=!0,o["a"].save(this.form,function(){t.isLoading=!1,t.$message.success("保存成功!"),t.$router.push({name:"group"}),t.$route.meta.keepAlive=!1},function(){t.isLoading=!1})},loadData:function(){var t=this;o["a"].detail({id:this.$route.query.id},function(e){t.form=e.data.data})},back:function(){this.$router.back()},edit:function(){this.isNoEdit=!1}}},u=r,s=(i("4ac7"),i("2877")),l=Object(s["a"])(u,n,a,!1,null,"be41375e",null);l.options.__file="groupAdd.vue";e["default"]=l.exports},e03f:function(t,e,i){"use strict";i.d(e,"a",function(){return r});var n=i("c665"),a=i("aa9a"),o=(i("551c"),i("8a81"),i("4a2d")),r=function(){function t(){Object(n["a"])(this,t)}return Object(a["a"])(t,null,[{key:"index",value:function(t,e,i){o["a"].request(this.uri()+"entry",e,i,t)}},{key:"save",value:function(t,e,i){o["a"].request(this.uri()+"save",e,i,t)}},{key:"detail",value:function(t,e,i){o["a"].request(this.uri()+"detail",e,i,t)}},{key:"delete",value:function(t,e,i){o["a"].request(this.uri()+"delete",e,i,t)}},{key:"uri",value:function(){return o["a"].url()+"group/"}}]),t}()},f3af:function(t,e,i){}}]);
//# sourceMappingURL=chunk-04dd.70aac67c.js.map