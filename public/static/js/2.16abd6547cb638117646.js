webpackJsonp([2,3,5,8],{"11jQ":function(e,t,r){"use strict";t.a={computed:{currentServer:{set:function(e){this.$store.commit("app/setCurrentServer",e)},get:function(){return this.$store.state.app.currentServer}}}}},fo2f:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=r("Dd8w"),n=r.n(o),a=r("NYxO"),i=r("7109"),l={name:"m-header",computed:n()({projectNameString:function(){return"string"==typeof this.projectName?this.projectName:this.projectName.name||"chat-logging"},isLogo:function(){return this.projectName&&this.projectName.img&&"string"==typeof this.projectName.img&&""!==this.projectName.img}},Object(a.c)("app",["projectName","navBarItems"])),methods:{openURL:function(e){if(e.url&&"string"==typeof e.url&&""!==e.url)return e.blank?Object(i.D)(e.url):void(window.location=e.url)}}},s=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("q-layout-header",[r("q-toolbar",{attrs:{color:"light-blue"}},[r("q-toolbar-title",[e.isLogo?r("img",{attrs:{src:e.projectName.img,alt:e.projectNameString},on:{click:function(t){e.openURL(e.projectName)}}}):r("span",{on:{click:function(t){e.openURL(e.projectName)}}},[e._v(e._s(e.projectNameString))])]),e._v(" "),e._l(e.navBarItems,function(t,o){return r("q-btn",{key:o,staticClass:"btn--toolbar",attrs:{flat:"",label:t.name,push:"","wait-for-ripple":"",size:"md"},on:{click:function(r){e.openURL(t)}}})})],2)],1)},c=[];s._withStripped=!0;var u=r("XyMi"),p=Object(u.a)(l,s,c,!1,null,null,null);p.options.__file="src\\components\\m-header.vue";t.default=p.exports},jMCy:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o={name:"m-footer",components:{ServerSwitcher:r("lESZ").default}},n=function(){var e=this.$createElement,t=this._self._c||e;return t("q-layout-footer",[t("server-switcher")],1)},a=[];n._withStripped=!0;var i=r("XyMi"),l=Object(i.a)(o,n,a,!1,null,null,null);l.options.__file="src\\components\\m-footer.vue";t.default=l.exports},lESZ:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=r("Dd8w"),n=r.n(o),a=r("NYxO"),i={name:"server-switcher",mixins:[r("11jQ").a],computed:n()({},Object(a.b)("app",["showServersTabs"]),Object(a.c)("app",["servers"]))},l=function(){var e=this,t=e.$createElement,r=e._self._c||t;return e.showServersTabs?r("q-tabs",{attrs:{align:"center",color:"light-blue",position:"top"},model:{value:e.currentServer,callback:function(t){e.currentServer=t},expression:"currentServer"}},[r("q-tab",{key:"all",attrs:{slot:"title",name:"all",label:"Все",icon:"cast_connected"},slot:"title"}),e._v(" "),e._l(e.servers,function(e,t){return r("q-tab",{key:t,attrs:{slot:"title",name:t,label:e.fullName,icon:"cast"},slot:"title"})})],2):e._e()},s=[];l._withStripped=!0;var c=r("XyMi"),u=Object(c.a)(i,l,s,!1,null,null,null);u.options.__file="src\\components\\server-switcher.vue";t.default=u.exports},lfHO:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var o=r("fo2f"),n=r("jMCy"),a={name:"LayoutDefault",components:{MHeader:o.default,MFooter:n.default}},i=function(){var e=this.$createElement,t=this._self._c||e;return t("q-layout",{attrs:{view:"hhh LpR fFf"}},[t("m-header"),this._v(" "),t("q-page-container",[t("router-view")],1),this._v(" "),t("m-footer")],1)},l=[];i._withStripped=!0;var s=r("XyMi"),c=Object(s.a)(a,i,l,!1,null,null,null);c.options.__file="src\\layouts\\default.vue";t.default=c.exports}});