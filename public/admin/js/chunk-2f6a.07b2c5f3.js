(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2f6a"],{"228e":function(t,e,a){"use strict";a.r(e);var l=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"page"},[a("el-row",{staticClass:"header"},[a("el-col",{staticClass:"filter-label",attrs:{span:2}},[t._v("规则编号:")]),a("el-col",{attrs:{span:4}},[a("el-input",{staticClass:"filter-match",attrs:{placeholder:"请输入"},model:{value:t.data.id,callback:function(e){t.$set(t.data,"id",e)},expression:"data.id"}})],1),a("el-col",{staticClass:"filter-label",attrs:{span:2}},[t._v(" 状态:")]),a("el-col",{attrs:{span:4}},[a("el-select",{staticClass:"filter-match",attrs:{placeholder:"请选择"},model:{value:t.data.status,callback:function(e){t.$set(t.data,"status",e)},expression:"data.status"}},t._l(t.statusOptions,function(t){return a("el-option",{key:t.value,attrs:{label:t.label,value:t.value}})}))],1),a("el-col",{staticClass:"filter-btn",attrs:{span:6}},[a("el-button",{attrs:{icon:"el-icon-search",type:"primary"},on:{click:function(e){t.loadData(1)}}},[t._v("查询")]),a("el-button",{attrs:{icon:"el-icon-refresh"},on:{click:function(e){t.ref()}}},[t._v("重置")]),a("el-button",{attrs:{icon:"el-icon-plus",type:"primary"},on:{click:t.add}},[t._v("新建")])],1)],1),a("el-table",{staticStyle:{width:"100%"},attrs:{data:t.res.data,stripe:""}},[a("el-table-column",{attrs:{prop:"id",sortable:"",label:"编号"}}),a("el-table-column",{attrs:{prop:"name",label:"名称"}}),a("el-table-column",{attrs:{sortable:"",prop:"status",label:"状态"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("span",[t._v(t._s(1===e.row.status?"启用":"未启用"))])]}}])}),a("el-table-column",{attrs:{prop:"category.name",label:"类目"}}),a("el-table-column",{attrs:{prop:"price",label:"价格"}}),a("el-table-column",{attrs:{prop:"publish_time",label:"发布时间"}}),a("el-table-column",{attrs:{label:"操作"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{type:"text",size:"small"},on:{click:function(a){t.handleClick(e.row)}}},[t._v("编辑")]),a("el-button",{attrs:{type:"text",size:"small"},on:{click:function(a){t.del(e)}}},[t._v("删除")])]}}])})],1),a("div",{staticClass:"pagination "},[a("el-pagination",{attrs:{background:"",layout:"total,prev, pager, next,jumper","page-count":t.res.last_page},on:{"current-change":t.loadData}})],1)],1)},s=[],n=(a("7f7f"),a("4efe")),i={data:function(){return{data:{id:null,status:null,jump_page:null},statusOptions:[{label:"可用",value:1},{label:"不可用",value:0}],res:{}}},mounted:function(){this.loadData(1)},methods:{loadData:function(t){var e=this;this.data.jump_page=t,n["a"].index(this.data,function(t){e.res=t.data.data})},add:function(){this.$router.push({name:"resourcesAdd"})},ref:function(){this.data={id:null,status:null,jump_page:null},this.loadData(1)},del:function(t){var e=this,a=this;this.$confirm("确认删除"+t.row.name+"?","提示",{confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then(function(){n["a"].delete({id:t.row.id},function(){e.$message.success("删除成功"),a.loadData(1)})})},handleClick:function(t){this.$router.push({name:"resourcesAdd",query:{id:t.id}})}}},c=i,u=(a("e339"),a("2877")),r=Object(u["a"])(c,l,s,!1,null,"2e5b0515",null);r.options.__file="resources.vue";e["default"]=r.exports},"4efe":function(t,e,a){"use strict";a.d(e,"a",function(){return o});var l=a("c665"),s=a("dc0a"),n=a("aa9a"),i=a("d328"),c=a("11d9"),u=a("b8d7"),r=a("4a2d"),o=function(t){function e(){return Object(l["a"])(this,e),Object(i["a"])(this,Object(c["a"])(e).apply(this,arguments))}return Object(n["a"])(e,null,[{key:"index",value:function(t,a,l){Object(u["a"])(Object(c["a"])(e),"request",this).call(this,this.uri()+"entry",a,l,t)}},{key:"detail",value:function(t,a,l){Object(u["a"])(Object(c["a"])(e),"request",this).call(this,this.uri()+"detail",a,l,t)}},{key:"save",value:function(t,a,l){Object(u["a"])(Object(c["a"])(e),"request",this).call(this,this.uri()+"save",a,l,t)}},{key:"delete",value:function(t,a,l){Object(u["a"])(Object(c["a"])(e),"request",this).call(this,this.uri()+"delete",a,l,t)}},{key:"spinner",value:function(t,a){Object(u["a"])(Object(c["a"])(e),"request",this).call(this,this.uri()+"spinner",t,a)}},{key:"uri",value:function(){return Object(u["a"])(Object(c["a"])(e),"url",this).call(this)+"service/"}}]),Object(s["a"])(e,t),e}(r["a"])},e339:function(t,e,a){"use strict";var l=a("ff04"),s=a.n(l);s.a},ff04:function(t,e,a){}}]);
//# sourceMappingURL=chunk-2f6a.07b2c5f3.js.map