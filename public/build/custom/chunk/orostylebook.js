(globalThis.webpackChunk=globalThis.webpackChunk||[]).push([[349],{"../node_modules/@oroinc/oro-webpack-config-builder/loader/tpl-loader.js!./bundles/orostylebook/templates/style-book/style-book-colors-view.html":(module,__unused_webpack_exports,__webpack_require__)=>{var _=__webpack_require__("./bundles/oroui/js/extend/underscore.js");module.exports=function(obj){var __t,__p="",__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,"")};with(obj||{})__p+="",colorPalette&&(__p+="\n    ",_.each(colorPalette,(function(e,t){__p+='\n        <div class="color-palette">\n            <h3 class="color-palette__palette-title">\n                <span class="color-palette__palette-title--key">$palette:</span>\n                <span class="color-palette__palette-title--value">'+(null==(__t=t)?"":_.escape(__t))+'</span>\n            </h3>\n            <div class="grid">\n                ',_.each(e,(function(e,o){__p+='\n                    <div class="color-palette__color-box grid-col-4 grid-col-mobile-landscape-6 grid-col-mobile-12">\n                        $key:\n                        <strong class="color-palette__name--title">'+(null==(__t=o)?"":_.escape(__t))+'</strong>\n                        <div class="color-palette__name color-palette__name--'+(null==(__t=t)?"":_.escape(__t))+"-"+(null==(__t=o)?"":_.escape(__t))+'" style="background: '+(null==(__t=e)?"":_.escape(__t))+';">'+(null==(__t=e)?"":_.escape(__t))+'</div>\n                        <code class="color-palette__usage language-css">get-color(\''+(null==(__t=t)?"":_.escape(__t))+"', '"+(null==(__t=o)?"":_.escape(__t))+"');</code>\n                    </div>\n                "})),__p+="\n            </div>\n        </div>\n    "})),__p+="\n"),__p+="\n";return __p}},"../node_modules/@oroinc/oro-webpack-config-builder/loader/tpl-loader.js!./bundles/orostylebook/templates/style-book/style-book-elements-nav-item.html":(module,__unused_webpack_exports,__webpack_require__)=>{var _=__webpack_require__("./bundles/oroui/js/extend/underscore.js");module.exports=function(obj){var __t,__p="",__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,"")};with(obj||{}){if(__p+="",items.length){__p+="\n    ";var subTreeLvl=0;for(__p+='\n    <nav class="style-book-menu navbar">\n        ',i=0;i<items.length;i++){if(__p+="\n            ",i+1<items.length)var nextItmTreeLvl=items[i+1].subTreeLvl||0;if(__p+='\n                <a href="#'+(null==(__t=items[i].id)?"":_.escape(__t))+'" class="nav-link style-book-menu__link">'+(null==(__t=_.__(items[i].label))?"":_.escape(__t))+"</a>\n                ",i+1<items.length&&subTreeLvl<nextItmTreeLvl)__p+="\n                    ",subTreeLvl+=1,__p+='\n                    <nav class="style-book-menu nav">\n                        ';else if(__p+="\n\n                        ",i+1<items.length&&subTreeLvl>nextItmTreeLvl){for(__p+="\n                        ",j=0;j<subTreeLvl-nextItmTreeLvl;j++)__p+="\n                    </nav>\n                ";__p+="\n                ",subTreeLvl=subTreeLvl+nextItmTreeLvl-subTreeLvl,__p+="\n                "}else __p+="\n        "}__p+="\n    </nav>\n"}__p+="\n"}return __p}},"../node_modules/@oroinc/oro-webpack-config-builder/loader/tpl-loader.js!./bundles/orostylebook/templates/style-book/style-book-playground.html":(module,__unused_webpack_exports,__webpack_require__)=>{var _=__webpack_require__("./bundles/oroui/js/extend/underscore.js");module.exports=function(obj){var __t,__p="",__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,"")};with(obj||{})__p+="",_(props).mapObject((function(e,t){__p+='\n<div class="grid-col-12">\n    ',"input"===e.type&&(__p+="\n    ",_.isBoolean(e.value)&&(__p+='\n    <label for="form_checkbox-'+(null==(__t=t)?"":_.escape(__t))+'" class="checkbox-label">\n        <input type="checkbox" id="form_checkbox-'+(null==(__t=t)?"":_.escape(__t))+'" name="form['+(null==(__t=t)?"":_.escape(__t))+']" data-ftid="form_checkbox" data-name="'+(null==(__t=t)?"":_.escape(__t))+'" '+(null==(__t=e.value?"checked":"")?"":__t)+' data-bind="'+(null==(__t=e.bind)?"":_.escape(__t))+'">\n        '+(null==(__t=e.label)?"":_.escape(__t))+"\n    </label>\n    "),__p+="\n\n    ",_.isString(e.value)&&(__p+='\n    <label class="label label--full required" for="form_text-'+(null==(__t=t)?"":_.escape(__t))+'">'+(null==(__t=e.label)?"":_.escape(__t))+'</label>\n    <input type="text" id="form_text-'+(null==(__t=t)?"":_.escape(__t))+'" name="form['+(null==(__t=t)?"":_.escape(__t))+']" data-ftid="form_text" data-name="'+(null==(__t=t)?"":_.escape(__t))+'" class=" form-field-text input input--full" placeholder="" value="'+(null==(__t=e.value)?"":_.escape(__t))+'" data-bind="'+(null==(__t=e.bind)?"":_.escape(__t))+'" />\n    '),__p+="\n\n    ",_.isNumber(e.value)&&(__p+='\n    <label class="label label--full required" for="form_number-'+(null==(__t=t)?"":_.escape(__t))+'">'+(null==(__t=e.label)?"":_.escape(__t))+'</label>\n    <input type="number" id="form_number-'+(null==(__t=t)?"":_.escape(__t))+'" name="form['+(null==(__t=t)?"":_.escape(__t))+']" data-ftid="form_text" data-name="'+(null==(__t=t)?"":_.escape(__t))+'" class=" form-field-text input input--full" placeholder="" value="'+(null==(__t=e.value)?"":_.escape(__t))+'" data-bind="'+(null==(__t=e.bind)?"":_.escape(__t))+'" />\n    '),__p+="\n    "),__p+="\n\n    ","textarea"!==e.type&&"template"!==e.type||(__p+='\n    <label class="label label--full required" for="form_textarea-'+(null==(__t=t)?"":_.escape(__t))+'">'+(null==(__t=e.label)?"":_.escape(__t))+'</label>\n    <textarea id="form_textarea-'+(null==(__t=t)?"":_.escape(__t))+'" '+(null==(__t="template"===e.type?'data-template="true"':"")?"":__t)+' name="form['+(null==(__t=t)?"":_.escape(__t))+']" data-ftid="form_textarea" data-name="'+(null==(__t=t)?"":_.escape(__t))+'" class=" form-field-textarea textarea textarea--full" rows="3" data-bind="'+(null==(__t=e.bind)?"":_.escape(__t))+'">'+(null==(__t=e.value)?"":_.escape(__t))+"</textarea>\n    "),__p+="\n</div>\n"})),__p+="\n";return __p}},"./bundles/orofrontend/json/grid-config.js":(e,t,o)=>{var s;void 0===(s=function(){"use strict";return{el:"#grid-frontend-customer-customer-address-grid-1907571008",gridName:"frontend-customer-customer-address-grid",builders:["orofilter/js/datafilter-builder","orodatagrid/js/totals-builder"],metadata:{jsmodules:["orofilter/js/datafilter-builder","orodatagrid/js/totals-builder"],options:{gridName:"frontend-customer-customer-address-grid",frontend:!0,additional_fields:[],inputName:!1,toolbarOptions:{placement:{bottom:!0,top:!0},hide:!1,addResetAction:!0,addRefreshAction:!0,datagridSettingsManager:!0,turnOffToolbarRecordsNumber:0,pageSize:{},pagination:{hide:!1,onePage:!1},addSorting:!1,disableNotSelectedOption:!1},urlParams:{originalRoute:"oro_customer_frontend_customer_user_address_index"},route:"oro_frontend_datagrid_index",contentTags:["Oro_Bundle_CustomerBundle_Entity_CustomerAddress_type_collection"],multipleSorting:!1,url:""},lazy:!0,massActions:{delete:{label:"Delete",type:"delete",entity_name:"Oro\\Bundle\\CustomerBundle\\Entity\\CustomerUserAddress",data_identifier:"address.id",name:"delete",frontend_type:"delete-mass",route:"oro_datagrid_front_mass_action",launcherOptions:{iconClassName:"fa-trash"},defaultMessages:{confirm_title:"oro.customer.mass_actions.delete_customer_addresses.confirm_title",confirm_content:"oro.customer.mass_actions.delete_customer_addresses.confirm_content",confirm_ok:"oro.customer.mass_actions.delete_customer_addresses.confirm_ok"},confirmMessages:{selected_message:"oro.customer.mass_actions.delete_customer_addresses.confirm_content"},messages:{success:"oro.customer.mass_actions.delete_customer_addresses.success_message"},token:"twyTtWh-fGGmE6-MfM29WxfA5lnUEXfguCjafr8WDUQ",handler:"oro_datagrid.extension.mass_action.handler.delete",frontend_handle:"ajax",route_parameters:[],confirmation:!0,allowedRequestTypes:["POST","DELETE"],requestType:"POST"}},rowActions:{show_map:{label:"Map",type:"map",icon:"map-o",frontend_type:"frontend-map",name:"show_map"},update:{label:"Edit",type:"navigate",link:"update_link",icon:"pencil",name:"update",frontend_type:"navigate",launcherOptions:{onClickReturnValue:!1,runAction:!0,className:"no-hash"}},delete:{type:"button-widget",label:"Delete",rowAction:!1,link:"#",icon:"trash-o",order:520,name:"delete",frontend_type:"button-widget",launcherOptions:{onClickReturnValue:!0,runAction:!0,className:"no-hash",widget:[],messages:[]}},oro_customer_frontend_address_delete:{type:"button-widget",label:"Delete",rowAction:!1,link:"#",icon:"trash",order:520,name:"oro_customer_frontend_address_delete",frontend_type:"button-widget",launcherOptions:{onClickReturnValue:!0,runAction:!0,className:"no-hash",widget:[],messages:[]}}},initialState:{},state:{},gridViews:{views:[{name:"__all__",label:"__all__",icon:"fa-table",appearanceType:"grid",appearanceData:[],type:"system",filters:[],sorters:[],columns:[],editable:!1,deletable:!1,is_default:!1,shared_by:null}],gridName:"frontend-customer-customer-address-grid",permissions:{VIEW:!0,CREATE:!0,EDIT:!0,DELETE:!0,SHARE:!0,EDIT_SHARED:!0}},filters:[{name:"street",label:"Customer Address",choices:[{attr:[],label:"contains",value:"1",data:1},{attr:[],label:"does not contain",value:"2",data:2},{attr:[],label:"is equal to",value:"3",data:3},{attr:[],label:"starts with",value:"4",data:4},{attr:[],label:"ends with",value:"5",data:5},{attr:[],label:"is any of",value:"6",data:6},{attr:[],label:"is not any of",value:"7",data:7},{attr:[],label:"is empty",value:"filter_empty_option",data:"filter_empty_option"},{attr:[],label:"is not empty",value:"filter_not_empty_option",data:"filter_not_empty_option"}],type:"string",enabled:!0,visible:!0,translatable:!0,force_like:!1,case_insensitive:!0,min_length:0,max_length:0x8000000000000000,lazy:!1,cacheId:null},{name:"city",label:"City",choices:[{attr:[],label:"contains",value:"1",data:1},{attr:[],label:"does not contain",value:"2",data:2},{attr:[],label:"is equal to",value:"3",data:3},{attr:[],label:"starts with",value:"4",data:4},{attr:[],label:"ends with",value:"5",data:5},{attr:[],label:"is any of",value:"6",data:6},{attr:[],label:"is not any of",value:"7",data:7},{attr:[],label:"is empty",value:"filter_empty_option",data:"filter_empty_option"},{attr:[],label:"is not empty",value:"filter_not_empty_option",data:"filter_not_empty_option"}],type:"string",enabled:!0,visible:!0,translatable:!0,force_like:!1,case_insensitive:!0,min_length:0,max_length:0x8000000000000000,lazy:!1,cacheId:null},{name:"state",label:"State",choices:[{attr:[],label:"contains",value:"1",data:1},{attr:[],label:"does not contain",value:"2",data:2},{attr:[],label:"is equal to",value:"3",data:3},{attr:[],label:"starts with",value:"4",data:4},{attr:[],label:"ends with",value:"5",data:5},{attr:[],label:"is any of",value:"6",data:6},{attr:[],label:"is not any of",value:"7",data:7},{attr:[],label:"is empty",value:"filter_empty_option",data:"filter_empty_option"},{attr:[],label:"is not empty",value:"filter_not_empty_option",data:"filter_not_empty_option"}],type:"string",enabled:!0,visible:!0,translatable:!0,force_like:!1,case_insensitive:!0,min_length:0,max_length:0x8000000000000000,lazy:!1,cacheId:null},{name:"zip",label:"Zip/Postal Code",choices:[{attr:[],label:"contains",value:"1",data:1},{attr:[],label:"does not contain",value:"2",data:2},{attr:[],label:"is equal to",value:"3",data:3},{attr:[],label:"starts with",value:"4",data:4},{attr:[],label:"ends with",value:"5",data:5},{attr:[],label:"is any of",value:"6",data:6},{attr:[],label:"is not any of",value:"7",data:7},{attr:[],label:"is empty",value:"filter_empty_option",data:"filter_empty_option"},{attr:[],label:"is not empty",value:"filter_not_empty_option",data:"filter_not_empty_option"}],type:"string",enabled:!0,visible:!0,translatable:!0,force_like:!1,case_insensitive:!0,min_length:0,max_length:0x8000000000000000,lazy:!1,cacheId:null},{name:"countryName",label:"Country",choices:[{attr:[],label:"contains",value:"1",data:1},{attr:[],label:"does not contain",value:"2",data:2},{attr:[],label:"is equal to",value:"3",data:3},{attr:[],label:"starts with",value:"4",data:4},{attr:[],label:"ends with",value:"5",data:5},{attr:[],label:"is any of",value:"6",data:6},{attr:[],label:"is not any of",value:"7",data:7},{attr:[],label:"is empty",value:"filter_empty_option",data:"filter_empty_option"},{attr:[],label:"is not empty",value:"filter_not_empty_option",data:"filter_not_empty_option"}],type:"string",enabled:!0,visible:!0,translatable:!0,force_like:!1,case_insensitive:!0,min_length:0,max_length:0x8000000000000000,lazy:!1,cacheId:null}],columns:[{label:"Customer Address",type:"string",translatable:!0,editable:!1,shortenableLabel:!0,name:"street",order:0,renderable:!0,sortable:!0},{label:"City",type:"string",translatable:!0,editable:!1,shortenableLabel:!0,name:"city",order:1,renderable:!0,sortable:!0},{label:"State",type:"string",translatable:!0,editable:!1,shortenableLabel:!0,name:"state",order:2,renderable:!0,sortable:!0},{label:"Zip/Postal Code",type:"string",translatable:!0,editable:!1,shortenableLabel:!0,name:"zip",order:3,renderable:!0,sortable:!0},{label:"Country",type:"string",translatable:!0,editable:!1,shortenableLabel:!0,name:"countryName",order:4,renderable:!0,sortable:!0},{label:"Type",type:"html",translatable:!0,editable:!1,shortenableLabel:!0,name:"types",order:5,renderable:!0}],gridParams:{},enableFloatingHeaderPlugin:!1},data:{data:[{street:"45600 Marion Drive",city:"Winter Haven",state:"Florida",zip:"33830",countryName:"United States",types:"\n                \nDefault Billing, Default Shipping\n",id:"2",update_link:"/customer/user/address/customer/2/update/2",action_configuration:{delete:!1,oro_customer_frontend_address_delete:{hasDialog:!1,showDialog:!0,executionUrl:"/ajax/operation/execute/oro_customer_frontend_address_delete?entityClass=Oro%5CBundle%5CCustomerBundle%5CEntity%5CCustomerAddress&entityId=2&datagrid=frontend-customer-customer-address-grid&group%5B0%5D=&group%5B1%5D=datagridRowAction",url:"/ajax/operation/execute/oro_customer_frontend_address_delete?entityClass=Oro%5CBundle%5CCustomerBundle%5CEntity%5CCustomerAddress&entityId=2&datagrid=frontend-customer-customer-address-grid&group%5B0%5D=&group%5B1%5D=datagridRowAction",jsDialogWidget:"oro/dialog-widget",executionTokenData:{oro_action_operation_execution:{operation_execution_csrf_token:"dBGU11ea-MobabLOQdLDfR13RqgC8mOkA5aVAP0FOQQ"}},confirmation:{title:"oro.action.delete_entity",message:"oro.action.delete_confirm",okText:"oro.action.button.delete",component:"oroui/js/delete-confirmation",message_parameters:{entityLabel:"Customer Address"}}}}},{street:"67800 Junkins Avenue",city:"Albany",state:"Georgia",zip:"31707",countryName:"United States",types:"\n                \nDefault Billing, Default Shipping\n",id:"3",update_link:"/customer/user/address/customer/3/update/3",action_configuration:{delete:!1,oro_customer_frontend_address_delete:{hasDialog:!1,showDialog:!0,executionUrl:"/ajax/operation/execute/oro_customer_frontend_address_delete?entityClass=Oro%5CBundle%5CCustomerBundle%5CEntity%5CCustomerAddress&entityId=3&datagrid=frontend-customer-customer-address-grid&group%5B0%5D=&group%5B1%5D=datagridRowAction",url:"/ajax/operation/execute/oro_customer_frontend_address_delete?entityClass=Oro%5CBundle%5CCustomerBundle%5CEntity%5CCustomerAddress&entityId=3&datagrid=frontend-customer-customer-address-grid&group%5B0%5D=&group%5B1%5D=datagridRowAction",jsDialogWidget:"oro/dialog-widget",executionTokenData:{oro_action_operation_execution:{operation_execution_csrf_token:"xEq5Nx_L9e5z_TgcyGPdHfOQ1G7biOCkHMwHQylLTrY"}},confirmation:{title:"oro.action.delete_entity",message:"oro.action.delete_confirm",okText:"oro.action.button.delete",component:"oroui/js/delete-confirmation",message_parameters:{entityLabel:"Customer Address"}}}}},{street:"801 Scenic Hwy",city:"Haines City",state:"Florida",zip:"33844",countryName:"United States",types:"\n                \nDefault Billing, Default Shipping\n",id:"1",update_link:"/customer/user/address/customer/1/update/1",action_configuration:{delete:!1,oro_customer_frontend_address_delete:{hasDialog:!1,showDialog:!0,executionUrl:"/ajax/operation/execute/oro_customer_frontend_address_delete?entityClass=Oro%5CBundle%5CCustomerBundle%5CEntity%5CCustomerAddress&entityId=1&datagrid=frontend-customer-customer-address-grid&group%5B0%5D=&group%5B1%5D=datagridRowAction",url:"/ajax/operation/execute/oro_customer_frontend_address_delete?entityClass=Oro%5CBundle%5CCustomerBundle%5CEntity%5CCustomerAddress&entityId=1&datagrid=frontend-customer-customer-address-grid&group%5B0%5D=&group%5B1%5D=datagridRowAction",jsDialogWidget:"oro/dialog-widget",executionTokenData:{oro_action_operation_execution:{operation_execution_csrf_token:"DyvMsszIl5O45XOd102VMKoergWzZFpeVPzqlFBmgdI"}},confirmation:{title:"oro.action.delete_entity",message:"oro.action.delete_confirm",okText:"oro.action.button.delete",component:"oroui/js/delete-confirmation",message_parameters:{entityLabel:"Customer Address"}}}}}],options:{hideToolbar:!1,totalRecords:3,totals:[]}},enableFilters:!0,enableToggleFilters:!0,filterContainerSelector:"[data-grid-toolbar='top'] [data-role='filter-container']",filtersStateElement:null,enableViews:!0,showViewsInNavbar:!1,showViewsInCustomElement:!1,inputName:!1,themeOptions:{actionsDropdown:"auto",actionOptions:{refreshAction:{launcherOptions:{className:"btn btn--default btn--size-s refresh-action",icon:"undo fa--no-offset",launcherMode:"icon-only"}},resetAction:{launcherOptions:{className:"btn btn--default btn--size-s reset-action",icon:"refresh fa--no-offset",launcherMode:"icon-only"}}},customModules:{datagridSettingsComponent:"orofrontend/js/app/views/datagrid-settings/frontend-datagrid-settings-column-view"},toolbarTemplateSelector:"#template-customer-address-book-addresses-grid-toolbar",cellActionsHideCount:4,cellLauncherOptions:{launcherMode:"icon-only"}},toolbarOptions:{actionsPanel:{className:"btn-group not-expand frontend-datagrid__panel"},itemsCounter:{className:"datagrid-tool",transTemplate:"oro_frontend.datagrid.pagination.totalRecords.companyAddresses"},hideItemsCounter:!1},gridViewsOptions:{text:"oro.customer.customer_address_book.customer_addresses",icon:"map-marker"},gridBuildersOptions:[]}}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/fullscreen-popup-demo-view.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("./bundles/orofrontend/default/js/app/views/fullscreen-popup-view.js"),n=o("./bundles/oroui/js/extend/underscore.js"),i=o("./bundles/oroui/js/extend/jquery.js"),a=t.extend({constructor:function e(t){e.__super__.constructor.call(this,t)},initialize:function(e){a.__super__.initialize.call(this,e),this.subview("fullscreenView",new s(n.extend({},e,{disposeOnClose:!0,contentElement:i(n.template(e.contentTemplate)())})))},render:function(){this.subview("fullscreenView").show()}});return a}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/loading-mask-playground-view.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("./bundles/oroui/js/app/views/loading-mask-view.js"),n=o("./bundles/oroui/js/mediator.js"),i=o("./bundles/oroui/js/extend/underscore.js"),a=t.extend({optionNames:t.prototype.optionNames.concat(["el","loadingContainerSelector"]),loadingContainerSelector:"[data-loading-container]",events:{"click [data-toggle]":"toggle","click [data-toggle-full-page]":"toggleFullPage"},state:!1,executeTimeout:3e3,options:{},constructor:function e(t){return e.__super__.constructor.call(this,t)},initialize:function(e){a.__super__.initialize.call(this,e),this.options=i.extend({},i.omit(e,this.optionNames),{container:this.$(this.loadingContainerSelector)}),this.subview("loadingMask",new s(this.options)),this.subview("loadingMask").show(),this.state=!0},toggle:function(){this.state?this.subview("loadingMask").hide():this.subview("loadingMask").show(),this.state=!this.state},toggleFullPage:function(){n.execute("showLoading"),i.delay((function(){n.execute("hideLoading")}),this.executeTimeout)}});return a}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/sticky-sidebar-view.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("./bundles/oroui/js/mediator.js"),n=o("./bundles/oroui/js/extend/underscore.js"),i=o("./bundles/oroui/js/extend/jquery.js"),a=t.extend({keepElement:!0,optionNames:t.prototype.optionNames.concat(["toggleClass","excludeTarget","offsetTop","offsetBottom"]),toggleClass:"sticked",excludeTarget:null,offsetTop:0,offsetBottom:0,scrollTimeout:60,constructor:function e(t){e.__super__.constructor.call(this,t)},initialize:function(e){this.$el.addClass(this.toggleClass),this.setPosition(),a.__super__.initialize.call(this,e)},getExcludeTargetHeight:function(){return this.excludeTarget?this.excludeTarget.outerHeight():0},setElement:function(e){return this.$document=i(document),this.excludeTarget&&(this.excludeTarget=i(this.excludeTarget)),a.__super__.setElement.call(this,e)},setPosition:function(){const e=this.getExcludeTargetHeight()+this.offsetTop;this.$el.css({top:e,maxHeight:"calc(100vh - "+(e+this.offsetBottom)+"px)"})},delegateListeners:function(){a.__super__.delegateListeners.call(this),this.listenTo(s,"layout:reposition",this.setPosition.bind(this))},delegateEvents:function(e){return a.__super__.delegateEvents.call(this,e),this.$document.on("scroll"+this.eventNamespace(),n.throttle(this.setPosition.bind(this),this.scrollTimeout)),this},undelegateEvents:function(){this.$document&&this.$document.off(this.eventNamespace()),a.__super__.undelegateEvents.call(this)},dispose:function(){if(!this.disposed)return this.$el.removeClass(this.toggleClass).css({top:"",maxHeight:""}),this.undelegateEvents(),a.__super__.dispose.call(this)}});return a}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-colors-view.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("../node_modules/@oroinc/oro-webpack-config-builder/loader/tpl-loader.js!./bundles/orostylebook/templates/style-book/style-book-colors-view.html"),s=o("./bundles/oroui/js/app/views/base/view.js"),n=o("./bundles/oroui/js/extend/underscore.js");return s.extend({autoRender:!0,template:t,prefix:"--style-book-color",separator:"-",computedStyle:null,constructor:function e(t){this.computedStyle=getComputedStyle(document.documentElement),e.__super__.constructor.call(this,t)},getTemplateData:function(){const e={};let t=0,o=this._getProperty(["palette",t]);for(;o.length;){let s=0;for(e[o]={};this._getProperty([o,s]).length;){const t=this._getProperty([o,s]);e[o][t]=this._getProperty([o,t]),s++}t++,o=this._getProperty(["palette",t])}return{colorPalette:e}},_getProperty:function(e){return n.isArray(e)||(e=[e]),e.unshift(this.prefix),this.computedStyle.getPropertyValue(e.join(this.separator)).trim()}})}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-datagrid-playground.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/orostylebook/js/style-book/style-book-playground.js"),s=o("./bundles/orofrontend/json/grid-config.js"),n=o("./bundles/oroui/js/extend/underscore.js"),i=t.extend({subviewContainer:"[data-example-view]",constructor:function e(t){return e.__super__.constructor.call(this,t)},initialize:function(e){this.viewOptions=n.extend({},this.viewOptions,s),i.__super__.initialize.call(this,e)},createView:function(e){this.viewConstructor=e,this.constructorName=e.name,this.$el.find(this.subviewContainer).length&&n.extend(this.viewOptions,{_sourceElement:this.$el.find(this.subviewContainer),el:this.$el.find(this.subviewContainer).get()}),this.subview(this.constructorName,new e(this.viewOptions))},updateConfigPreview:function(){this.configPreview.text(JSON.stringify(n.omit(this.viewOptions,["data","massActions"]),null,"\t"))}});return i}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-dialog-widget.js":(e,t,o)=>{var s;void 0===(s=function(e){const t=o("./bundles/orowindows/js/widget/dialog-widget.js"),s=o("./bundles/oroui/js/extend/jquery.js"),n=o("./bundles/oroui/js/extend/underscore.js"),i=t.extend({content:null,constructor:function e(t){e.__super__.constructor.call(this,t)},initialize:function(e){e.url="",this.content=e.content,i.__super__.initialize.call(this,e)},isActual:function(){return!this.disposed},_onContentLoad:function(e){e=s(e).wrapAll("<div />");const t=s("<div />");return t.text(this.content),t.prependTo(e),e.find(".widget-actions").append('<button class="btn btn--info">Accept</button>'),e=e.parent().html(),i.__super__._onContentLoad.call(this,e)},closeHandler:function(e){n.isFunction(e)&&e()}});return i}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-dom-relocation.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("./bundles/oroui/js/extend/underscore.js"),n=o("./bundles/oroui/js/mediator.js"),i=t.extend({events:{"click [data-relocation-trigger]":"onMove"},moved:!1,constructor:function e(t){return e.__super__.constructor.call(this,t)},initialize:function(e){this.options=s.omit(e,["el"]),i.__super__.initialize.call(this,e)},onMove:function(){const e=this.$el.find("[data-relocate]");e.removeData().attr("data-dom-relocation-options",JSON.stringify({responsive:[{viewport:"desktop",moveTo:this.moved?".dom-relocation-point":".dom-relocation-target",prepend:!this.moved&&this.options.prepend,sibling:this.moved?".sibling-1":this.options.sibling,endpointClass:this.moved?null:this.options.endpointClass}]})),this.moved=!this.moved,this.moved||e.removeClass(this.options.endpointClass),n.trigger("layout:reposition")}});return i}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-elements-navigation-view.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("./bundles/oroui/js/extend/jquery.js"),n=o("./bundles/oroui/js/extend/underscore.js");o("../node_modules/@oroinc/bootstrap/js/dist/scrollspy.js");const i=t.extend({template:o("../node_modules/@oroinc/oro-webpack-config-builder/loader/tpl-loader.js!./bundles/orostylebook/templates/style-book/style-book-elements-nav-item.html"),autoRender:!0,offset:0,options:{elementSelector:"[data-style-book-element]",elementsContainerSelector:null,activeClass:"active"},listen:{"page:afterChange mediator":"initState"},events:{"click .nav-link":"onSwitchClick"},pageScrollDuration:20,constructor:function e(t){e.__super__.constructor.call(this,t)},initialize:function(e){this.options=n.extend({},this.options,e),this.template=this.options.template||this.template,this.offset=s(this.options.elementsContainerSelector).length?s(this.options.elementsContainerSelector).offset().top:0,this.initState(),i.__super__.initialize.call(this,e)},initState:function(){n.isEmpty(window.location.hash)||this.scrollToElement(window.location.hash)},onSwitchClick:function(e){e.preventDefault(),this.$el.find(this.options.itemSelector).removeClass(this.options.activeClass),s(e.target).parents().filter(this.options.itemSelector).addClass(this.options.activeClass),this.scrollToElement(s(e.target).attr("href"))},scrollToElement:function(e){const t=s(e);if(t.length){const o=t.offset().top-this.offset;s("body, html").animate({scrollTop:o},this.pageScrollDuration),window.location.hash=e}else history.replaceState(null,null," ")},getElementsList:function(){const e=s(this.options.elementSelector),t=[];return e.each(((e,o)=>{t.push(s(o).data("style-book-element"))})),t},render:function(){this.$el.html(this.template({items:this.getElementsList()})),this.$el.find(".nav-link:first").addClass(this.options.activeClass),s("body").scrollspy({target:"#"+this.$el.attr("id"),offset:2*this.offset-5})}});return i}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-googlemaps-view.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("./bundles/oroaddress/js/mapservice/googlemaps.js"),n=t.extend({constructor:function e(t){return e.__super__.constructor.call(this,t)},initialize:function(e){n.__super__.initialize.call(this,e),this.subview("googleMapView",new s(e))},dispose:function(){this.disposed||(this.subview("googleMapView").$el.empty(),n.__super__.dispose.call(this))}});return n}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-list-slider-view.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("./bundles/orofrontend/js/app/components/list-slider-component.js"),n=t.extend({constructor:function e(t){return e.__super__.constructor.call(this,t)},initialize:function(e){n.__super__.initialize.call(this,e),this.subview("listSlider",new s(e))},dispose:function(){this.disposed||(this.$el.slick("unslick"),this.$el.off(),n.__super__.dispose.call(this))}});return n}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-playground-widgets.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";return o("./bundles/orostylebook/js/style-book/style-book-playground.js").extend({constructor:function e(t){return e.__super__.constructor.call(this,t)}})}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-playground.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("../node_modules/@oroinc/oro-webpack-config-builder/loader/tpl-loader.js!./bundles/orostylebook/templates/style-book/style-book-playground.html"),n=o("./bundles/oroui/js/app/services/load-modules.js"),i=o("./bundles/oroui/js/extend/underscore.js"),a=o("./bundles/oroui/js/extend/jquery.js"),l=t.extend({optionNames:t.prototype.optionNames.concat(["props","viewConstructor","viewOptions","renderAfter","widget"]),viewConstructor:null,viewOptions:{},props:{},events:{"change [data-name]":"_onChangeProps"},template:s,configPreviewSelector:"[data-config]",viewPreviewSelector:"[data-playground-view]",playgroundPropsSelector:"[data-props]",renderAfter:"demand",subviewContainer:"[data-example-view]",widget:!1,constructor:function e(t){return e.__super__.constructor.call(this,t)},initialize:function(e){this.viewOptions=i.extend({},this.viewOptions),this.prepearProps(e.props),l.__super__.initialize.call(this,e),n(this.viewConstructor,this.createView,this),this.createPlayground(),this._onChangeProps=i.debounce(this._onChangeProps,500)},createView:function(e){if(this.viewConstructor=e,i.isString(this.viewConstructor)&&this.$el[this.viewConstructor](this.viewOptions),i.isFunction(this.viewConstructor)&&(this.constructorName=e.name,this.$el.find(this.subviewContainer).length&&i.extend(this.viewOptions,{_sourceElement:this.$el.find(this.subviewContainer),el:this.$el.find(this.subviewContainer).get()}),this.subview(this.constructorName,new e(this.viewOptions)),"demand"===this.renderAfter&&(/Component$/.test("ContentSliderComponent")||this.subview(this.constructorName).render(),this.subview(this.constructorName).$el.appendTo(this.$el.find(this.viewPreviewSelector))),"action"===this.renderAfter)){const e=this.$("[data-action]"),t=e.data("action").split(" ");e.on(t[0],this.renderViewViaMethod.bind(this,t[1]))}this.widget&&this.$el.inputWidget("seekAndCreate")},prepearProps:function(e){i.each(e,(function(e,t){i.isObject(e)&&(e=i.has(e,"value")?e.value:i.omit("label","type")),this._setBindOption(t.split("."),e,this.viewOptions)}),this)},disposeView:function(){i.isString(this.viewConstructor)&&this.$el[this.viewConstructor]("destroy"),i.isFunction(this.viewConstructor)&&this.subview(this.constructorName).dispose()},updateConfigPreview:function(){const e=JSON.stringify(this.viewOptions,((e,t)=>{if(!(null===t||t instanceof a||t instanceof HTMLElement))return t}),"\t");this.configPreview.text(e)},renderViewViaMethod:function(e){this.subview(this.constructorName)[e]()},createPlayground:function(){this.$el.find(this.playgroundPropsSelector).append(this.template({props:this._resolvePropsFormat(this.props)})),this.configPreview=this.$(this.configPreviewSelector),this.updateConfigPreview()},_resolvePropsFormat:function(e){return i.mapObject(e,(function(e,t){return i.isObject(e)||(e={value:e}),e.type||(e.type="input"),e.label||(e.label=t),e}))},_getViewOptions:function(e){return i.mapObject(i.clone(e),(function(e){return i.isObject(e)&&(e=e.value),e}))},_onChangeProps:function(e){const t=a(e.target),o=t.data("name");let s=t.is(":checkbox")?t.is(":checked"):t.val();"number"===t.attr("type")&&(s=parseFloat(s)),t.data("template")&&(s=i.template(s)),this._setBindOption(o.split("."),s,this.viewOptions),this.disposeView(),this.createView(this.viewConstructor),this.updateConfigPreview()},_setBindOption:function(e,t,o){const s=i.first(e);if(1===e.length)return void(o[s]=t);i.isUndefined(o[s])&&(o[s]={});const n=i.rest(e),a=o[s];if(n.length>1)return this._setBindOption(n,t,a);a[i.first(n)]=t}});return l}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-popup-gallery-widget.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("./bundles/orofrontend/js/app/components/popup-gallery-widget.js"),n=o("./bundles/oroui/js/extend/underscore.js"),i=t.extend({constructor:function e(t){return e.__super__.constructor.call(this,t)},initialize:function(e){i.__super__.initialize.call(this,e);const t=n.extend({},e,{galleryImages:[{thumb:"/bundles/orostylebook/images/promo-slider/promo-slider-small-1.jpg",src:"/bundles/orostylebook/images/promo-slider/promo-slider-1.jpg",alt:"Slide 1"},{thumb:"/bundles/orostylebook/images/promo-slider/promo-slider-small-2.jpg",src:"/bundles/orostylebook/images/promo-slider/promo-slider-2.jpg",alt:"Slide 2"},{thumb:"/bundles/orostylebook/images/promo-slider/promo-slider-small-3.jpg",src:"/bundles/orostylebook/images/promo-slider/promo-slider-3.jpg",alt:"Slide 3"}]});this.subview("popupGallery",new s(t))}});return i}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-sticky-panel-view.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("./bundles/oroui/js/mediator.js"),n=o("./bundles/oroui/js/extend/underscore.js"),i=t.extend({events:{"click [data-toggle]":"toggle"},moved:!1,constructor:function e(t){return e.__super__.constructor.call(this,t)},initialize:function(e){i.__super__.initialize.call(this,e)},toggle:function(){this.moved?this.$el.find("[data-move-to-sticky]").removeAttr("data-sticky-target").removeAttr("data-sticky"):this.$("[data-move-to-sticky]").attr("data-sticky-target","top-sticky-panel").attr("data-sticky",JSON.stringify({toggleClass:"sticked",placeholderId:"style-book-sticky-header",alwaysInSticky:!0})),this.moved=!this.moved,this.$("[data-toggle]").text(this.moved?n.__("oro_stylebook.groups.jscomponent.sticky_panel_view.button.sticky_on"):n.__("oro_stylebook.groups.jscomponent.sticky_panel_view.button.sticky_off")),s.trigger("page:afterChange")}});return i}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/style-book-zoom-widget-view.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("./bundles/oroui/js/app/services/load-modules.js"),n=t.extend({constructor:function e(t){return e.__super__.constructor.call(this,t)},initialize:function(e){n.__super__.initialize.call(this,e),s("oroproduct/js/widget/zoom-widget").then((()=>this.$el.zoomWidget(e)))},dispose:function(){this.disposed||(this.$el.zoomWidget("destroy"),n.__super__.dispose.call(this))}});return n}.call(t,o,t,e))||(e.exports=s)},"./bundles/orostylebook/js/style-book/toggle-action-view.js":(e,t,o)=>{var s;void 0===(s=function(e){"use strict";const t=o("./bundles/oroui/js/app/views/base/view.js"),s=o("./bundles/oroui/js/extend/jquery.js"),n=t.extend({optionNames:t.prototype.optionNames.concat(["toggleClass","target"]),keepElement:!0,toggleClass:"open",target:null,constructor:function e(t){e.__super__.constructor.call(this,t)},initialize:function(e){this.$el.on("click"+this.eventNamespace(),this.toggle.bind(this)),n.__super__.initialize.call(this,e)},setElement:function(e){return this.$document=s(document),this.target&&(this.target=s(this.target)),n.__super__.setElement.call(this,e)},delegateEvents:function(e){return n.__super__.delegateEvents.call(this,e),this.$document.on("click"+this.eventNamespace(),this.onClickOverlay.bind(this)),this},undelegateEvents:function(){this.$document&&this.$document.off(this.eventNamespace()),n.__super__.undelegateEvents.call(this)},toggle:function(e){this.target.toggleClass(this.toggleClass,e)},onClickOverlay:function(e){s(e.target).closest(this.$el).length||s(e.target).closest(this.target).length||this.toggle(!1)},dispose:function(){if(!this.disposed)return this.toggle(!1),this.$el.off(this.eventNamespace()),this.undelegateEvents(),n.__super__.dispose.call(this)}});return n}.call(t,o,t,e))||(e.exports=s)}}]);