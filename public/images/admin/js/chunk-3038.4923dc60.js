(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-3038"],{1349:function(e,t,i){"use strict";i.d(t,"a",function(){return u});var s=i("c665"),c=i("dc0a"),n=i("aa9a"),a=i("d328"),o=i("11d9"),r=i("b8d7"),l=i("4a2d"),u=function(e){function t(){return Object(s["a"])(this,t),Object(a["a"])(this,Object(o["a"])(t).apply(this,arguments))}return Object(n["a"])(t,null,[{key:"roleList",value:function(e,i,s){Object(r["a"])(Object(o["a"])(t),"request",this).call(this,this.uri()+"entry",i,s,e)}},{key:"add",value:function(e,i,s){Object(r["a"])(Object(o["a"])(t),"request",this).call(this,this.uri()+"save",i,s,e)}},{key:"delete",value:function(e,i,s){Object(r["a"])(Object(o["a"])(t),"request",this).call(this,this.uri()+"delete",i,s,e)}},{key:"detail",value:function(e,i,s){Object(r["a"])(Object(o["a"])(t),"request",this).call(this,this.uri()+"detail",i,s,e)}},{key:"permissions",value:function(e,i,s){Object(r["a"])(Object(o["a"])(t),"request",this).call(this,this.uri()+"get_role_permission",i,s,e)}},{key:"assignRolePermission",value:function(e,i,s){Object(r["a"])(Object(o["a"])(t),"request",this).call(this,this.uri()+"assign_role_permission",i,s,e)}},{key:"getRolePermission",value:function(e,i,s){Object(r["a"])(Object(o["a"])(t),"request",this).call(this,this.uri()+"get_role_permission",i,s,e)}},{key:"uri",value:function(){return Object(r["a"])(Object(o["a"])(t),"url",this).call(this)+"role/"}}]),Object(c["a"])(t,e),t}(l["a"])},"269e":function(e,t,i){"use strict";i.r(t);var s=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("div",{staticClass:"pages"},[i("H3",[e._v("授权管理")]),i("div",{staticClass:"line"}),i("el-form",{ref:"form",staticClass:"form",staticStyle:{"margin-top":"20px"},attrs:{"label-width":"120px"}},[i("el-form-item",{attrs:{label:"权限"}},[e._l(e.permissions,function(t){return i("div",{key:t.id},[i("el-checkbox",{attrs:{checked:1===t.role_status},on:{change:function(i){e.checkChange(t)}},model:{value:t.checked,callback:function(i){e.$set(t,"checked",i)},expression:"permission.checked"}},[e._v(e._s(t.name)+"\n                ")]),e._l(t.child,function(s){return i("div",{key:s.id,staticStyle:{"margin-left":"20px"}},[i("el-checkbox",{attrs:{checked:1===s.role_status},on:{change:function(i){e.checkChange(s,t)}},model:{value:s.checked,callback:function(t){e.$set(s,"checked",t)},expression:"child.checked"}},[e._v(e._s(s.name)+"\n                    ")]),i("div",{staticStyle:{"margin-left":"20px"}},e._l(s.child,function(c){return i("el-checkbox",{key:c.id,attrs:{checked:1===c.role_status},on:{change:function(i){e.checkChange(c,s,t)}},model:{value:c.checked,callback:function(t){e.$set(c,"checked",t)},expression:"item.checked"}},[e._v("\n                            "+e._s(c.name)+"\n                        ")])}))],1)})],2)}),i("el-button",{staticStyle:{"margin-left":"50px"},attrs:{type:"primary",loading:e.isLoading},on:{click:e.onSubmitPer}},[e._v("提交\n            ")]),i("el-button",{staticStyle:{"margin-left":"50px"},attrs:{plain:""},on:{click:function(t){e.$router.back()}}},[e._v("返回\n            ")])],2)],1)],1)},c=[],n=(i("ac6a"),i("1349")),a={name:"rolePer",data:function(){return{permissionsData:{},permissions:{},isLoading:!1,permission_id:[]}},mounted:function(){this.loadPermission()},methods:{loadPermission:function(){var e=this;n["a"].permissions({id:this.$route.query.id},function(t){e.permissions=t.data.data})},setCheck:function(e,t){var i=this;e.forEach(function(e){e.role_status=t,e.checked=1===t,null!=e.child&&i.setCheck(e.child,t)})},onSubmitPer:function(){var e=this;this.setPermissionId(this.permissions);var t={id:this.$route.query.id,permission_id:this.permission_id};this.isLoading=!0,n["a"].assignRolePermission(t,function(){e.isLoading=!1,e.$message.success("授权成功"),e.$router.push({name:"role"})},function(){e.isLoading=!0})},setPermissionId:function(e){var t=this;e.forEach(function(e){e.checked&&(t.permission_id.push(e.id),null!=e.child&&t.setPermissionId(e.child))})},checkChange:function(e,t,i){var s=e.checked?1:0;e.role_status=s,e.checked=1===s,null!=e.child&&this.setCheck(e.child,s),e.checked&&(null!=t&&(t.checked=!0,t.role_status=1),null!=i&&(i.checked=!0,i.role_status=1))}}},o=a,r=(i("f9d4"),i("2877")),l=Object(r["a"])(o,s,c,!1,null,"3ce2c2b0",null);l.options.__file="rolePer.vue";t["default"]=l.exports},cf8c:function(e,t,i){},f9d4:function(e,t,i){"use strict";var s=i("cf8c"),c=i.n(s);c.a}}]);
//# sourceMappingURL=chunk-3038.4923dc60.js.map