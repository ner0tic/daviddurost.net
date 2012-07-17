function ctTreeInfo(nodeProperties,prefix,hideType,expandLevel){this.nodeProperties=nodeProperties;this.currentItem=null;this.prefix=prefix;this.hideType=hideType;this.expandLevel=expandLevel;this.beginIndex=0;this.endIndex=0;};function ctMenuInfo(id,idSub){this.id=id;this.idSub=idSub;};var _ctIDSubMenuCount=0;var _ctIDSubMenu='ctSubTreeID';var _ctCurrentItem=null;var _ctNoAction=new Object();var _ctItemList=new Array();var _ctTreeList=new Array();var _ctMenuList=new Array();var _ctMenuInitStr='';var _ctNodeProperties={folderLeft:[['','']],folderRight:[['','']],itemLeft:[''],itemRight:[''],folderConnect:[[['',''],['','']]],itemConnect:[['',''],['','']],spacer:[['&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;']],themeLevel:1};function ctNewSubMenuID(){return _ctIDSubMenu+(++_ctIDSubMenuCount);};function ctActionItem(){return ' onmouseover="ctItemMouseOver (this.parentNode)" onmouseout="ctItemMouseOut (this.parentNode)" onmousedown="ctItemMouseDown (this.parentNode)" onmouseup="ctItemMouseUp (this.parentNode)"';};function ctNoActionItem(item){return item[1];};function ctGetPropertyLevel(level,property){return(level>=property.length)?(property.length-1):level;};function ctCollapseTree(id){var menu=ctGetObject(id).firstChild;var i;for(i=0;i<menu.ctItems.length;++i)ctCloseFolder(menu.ctItems[i]);};function ctExpandTree(id,expandLevel){if(expandLevel<=0)return;var obj=ctGetObject(id);if(!obj)return;var thisMenu=obj.firstChild;if(!thisMenu)return;ctExpandTreeSub(thisMenu,expandLevel)};function ctExpandTreeSub(subMenu,expandLevel){if(subMenu.ctLevel>=expandLevel)return;var i;var item;for(i=0;i<subMenu.ctItems.length;++i){item=subMenu.ctItems[i];if(item.ctIdSub){ctOpenFolder(item);ctExpandTreeSub(ctGetObject(item.ctIdSub),expandLevel);}}};function ctExposeItem(treeIndex,link){if(treeIndex<0||treeIndex>=_ctTreeList.length)return;var tree=_ctTreeList[treeIndex];var endIndex=tree.endIndex;var i;for(i=tree.beginIndex;i<endIndex;++i){if(_ctItemList[i].length>2&&_ctItemList[i][2]==link){return ctExposeTreeIndex(treeIndex,i);}}};function ctExposeTreeIndex(treeIndex,index){var item=ctGetObject('ctItemID'+(_ctTreeList[treeIndex].beginIndex+index)).parentNode;if(!item)return null;var parentItem=ctGetThisMenu(item).ctParent;if(parentItem)ctExposeTreeIndexSub(parentItem);ctSetSelectedItem(item);return item;};function ctExposeTreeIndexSub(item){var parentItem=ctGetThisMenu(item).ctParent;if(parentItem)ctExposeTreeIndexSub(parentItem);ctOpenFolder(item);};function ctMarkItem(treeIndex,link){if(treeIndex<0||treeIndex>=_ctTreeList.length)return;var tree=_ctTreeList[treeIndex];var endIndex=tree.endIndex;var i;for(i=tree.beginIndex;i<endIndex;++i){if(_ctItemList[i].length>2&&_ctItemList[i][2]==link){var item=ctGetObject('ctItemID'+(_ctTreeList[treeIndex].beginIndex+i)).parentNode;if(!item)return null;if(item.id=="JSCookTreeItem")item.id='JSCookTreeMarked';return item;}}};function ctMarkTreeIndex(treeIndex,index){var item=ctGetObject('ctItemID'+(_ctTreeList[treeIndex].beginIndex+index)).parentNode;if(!item)return null;if(item.id=="JSCookTreeItem")item.id='JSCookTreeMarked';return item;};function ctGetSelectedItem(treeIndex){if(_ctTreeList[treeIndex].hideType<=1)return _ctTreeList[treeIndex].currentItem;else return _ctCurrentItem;};function ctDraw(id,tree,nodeProperties,prefix,hideType,expandLevel){var obj=ctGetObject(id);if(!nodeProperties)nodeProperties=_ctNodeProperties;if(!prefix)prefix='';if(!hideType)hideType=0;if(!expandLevel)expandLevel=0;_ctTreeList[_ctTreeList.length]=new ctTreeInfo(nodeProperties,prefix,hideType,expandLevel);var treeIndex=_ctTreeList.length-1;var beginIndex=_ctItemList.length;_ctMenuInitStr='';var str=ctDrawSub(tree,true,null,treeIndex,0,nodeProperties,prefix,'');obj.innerHTML=str;eval(_ctMenuInitStr);_ctMenuInitStr='';var endIndex=_ctItemList.length;_ctTreeList[treeIndex].beginIndex=beginIndex;_ctTreeList[treeIndex].endIndex=endIndex;if(expandLevel)ctExpandTree(id,expandLevel);return treeIndex;};function ctDrawSub(subMenu,isMain,id,treeIndex,level,nodeProperties,prefix,indent){var lvl=level;if(lvl>nodeProperties.themeLevel)lvl=nodeProperties.themeLevel;var str='<div class="'+prefix+'TreeLevel'+lvl+'"';if(!isMain)str+=' id="'+id+'"';str+='>';var strSub='';var item;var idSub;var hasChild;var classStr;var connectSelect;var childIndent;var index;var actionStr;var itemID;var markerStr;var themeLevel=nodeProperties.themeLevel;var i;if(isMain)i=0;else i=5;var className=' class="'+prefix+'Row"';for(;i<subMenu.length;++i){item=subMenu[i];if(!item)continue;_ctItemList[_ctItemList.length]=item;index=_ctItemList.length-1;hasChild=(item.length>5);idSub=hasChild?ctNewSubMenuID():null;str+='<table cellspacing="0" class="'+prefix+'Table">';str+='<tr'+className;if(hasChild)str+=' id="JSCookTreeFolderClosed">';else str+=' id="JSCookTreeItem">';classStr=prefix+(hasChild?'Folder':'Item');itemID='ctItemID'+index;markerStr=' id="'+itemID+'"';_ctMenuInitStr+='ctSetupItem (ctGetObject ("'+itemID+'").parentNode,'+index+','+treeIndex+','+level+','+(idSub?('"'+idSub+'"'):'null')+');';str+='<td class="'+classStr+'Spacer"'+markerStr+'>'+indent;str+='</td>';if(item[0]==_ctNoAction){str+=ctNoActionItem(item,prefix);str+='</tr></table>';continue;}actionStr=ctActionItem();str+='<td class="'+classStr+'Left"'+actionStr+'>';if(hasChild){connectSelect=ctHasNextItem(i,subMenu)?0:1;lvl=ctGetPropertyLevel(level,nodeProperties.folderConnect);str+='<span class="JSCookTreeFolderClosed">'+nodeProperties.folderConnect[lvl][connectSelect][0]+'</span>'+'<span class="JSCookTreeFolderOpen">'+nodeProperties.folderConnect[lvl][connectSelect][1]+'</span>';}else{connectSelect=ctHasNextItem(i,subMenu)?0:1;lvl=ctGetPropertyLevel(level,nodeProperties.itemConnect);str+=nodeProperties.itemConnect[lvl][connectSelect];}if(item[0]!=null&&item[0]!=_ctNoAction){str+=item[0];}else if(hasChild){lvl=ctGetPropertyLevel(level,nodeProperties.folderLeft);str+='<span class="JSCookTreeFolderClosed">'+nodeProperties.folderLeft[lvl][0]+'</span>'+'<span class="JSCookTreeFolderOpen">'+nodeProperties.folderLeft[lvl][1]+'</span>';}else{lvl=ctGetPropertyLevel(level,nodeProperties.itemLeft);str+=nodeProperties.itemLeft[lvl];}str+='</td>';str+='<td class="'+classStr+'Text"'+actionStr+'>';str+='<a';if(item[2]!=null){str+=' href="'+item[2]+'"';if(item[3])str+=' target="'+item[3]+'"';}if(item[4]!=null)str+=' title="'+item[4]+'"';else str+=' title="'+item[1]+'"';str+='>'+item[1]+'</a></td>';str+='<td class="'+classStr+'Right"'+actionStr+'>';if(hasChild){lvl=ctGetPropertyLevel(level,nodeProperties.folderRight);str+='<span class="JSCookTreeFolderClosed">'+nodeProperties.folderRight[lvl][0]+'</span>'+'<span class="JSCookTreeFolderOpen">'+nodeProperties.folderRight[lvl][1]+'</span>';}else{lvl=ctGetPropertyLevel(level,nodeProperties.itemRight);str+=nodeProperties.itemRight[lvl];}str+='</td>';str+='</tr></table>';if(hasChild){childIndent=indent;lvl=ctGetPropertyLevel(level,nodeProperties.spacer);childIndent+=nodeProperties.spacer[lvl][connectSelect];str+=ctDrawSub(item,false,idSub,treeIndex,level+1,nodeProperties,prefix,childIndent);}}str+='</div>';return str;};function ctItemMouseOver(item){var treeItem=_ctItemList[item.ctIndex];var isDefaultItem=ctIsDefaultItem(treeItem);if(isDefaultItem){var className=ctGetDefaultClassName(item);if(item.className==className)item.className=className+'Hover';}};function ctItemMouseOut(item){if(ctIsDefaultItem(_ctItemList[item.ctIndex])){var className=ctGetDefaultClassName(item);if(item.className==(className+'Hover')||item.className==(className+'Active')){var tree=_ctTreeList[item.ctTreeIndex];var currentItem=(tree.hideType<=1)?tree.currentItem:_ctCurrentItem;if(item==currentItem)item.className=className+'Selected';else item.className=className;}}};function ctItemMouseDown(item){if(ctIsDefaultItem(_ctItemList[item.ctIndex])){var className=ctGetDefaultClassName(item);if(item.className==(className+'Hover'))item.className=className+'Active';}};function ctItemMouseUp(item){if(item.ctIdSub){var subMenu=ctGetObject(item.ctIdSub);if(subMenu.style.display=='block'){ctCloseFolder(item);}else{ctOpenFolder(item);}}ctSetSelectedItem(item);};function ctSetSelectedItem(item){var tree=_ctTreeList[item.ctTreeIndex];var hideType=tree.hideType;var otherItem;if(hideType<=1)otherItem=tree.currentItem;else otherItem=_ctCurrentItem;if(otherItem!=item){ctLabelMenu(item);if(otherItem){if(ctIsDefaultItem(_ctItemList[otherItem.ctIndex])){var className=ctGetDefaultClassName(otherItem);if(otherItem.className==(className+'Selected'))otherItem.className=className;}if(hideType>0&&otherItem)ctHideMenu(otherItem,item);}if(hideType<=1)tree.currentItem=item;else _ctCurrentItem=item;if(ctIsDefaultItem(_ctItemList[item.ctIndex])){var className=ctGetDefaultClassName(item);item.className=className+'Selected';}}};function ctIsFolderOpen(item){if(item.id=='JSCookTreeFolderOpen')return true;return false;};function ctOpenFolder(item){if(ctIsFolderOpen(item))return;if(item.ctIdSub){var subMenu=ctGetObject(item.ctIdSub);subMenu.style.display='block';item.id='JSCookTreeFolderOpen';}};function ctCloseFolder(item){if(!ctIsFolderOpen(item))return;if(item.ctIdSub){var subMenu=ctGetObject(item.ctIdSub);var i;for(i=0;i<subMenu.ctSubMenu.length;++i)ctCloseFolder(subMenu.ctSubMenu[i].ctParent);var expandLevel=_ctTreeList[item.ctTreeIndex].expandLevel;if(item.ctLevel<expandLevel)return;subMenu.style.display='none';item.id='JSCookTreeFolderClosed';}};function ctSetupItem(item,index,treeIndex,level,idSub){if(!item.ctIndex){item.ctIndex=index;item.ctTreeIndex=treeIndex;item.ctLevel=level;item.ctIdSub=idSub;}var thisMenu=ctGetThisMenu(item);ctSetupMenu(thisMenu,item,null,null);if(idSub){var subMenu=ctGetObject(idSub);ctSetupMenu(subMenu,null,thisMenu,item);}};function ctSetupMenu(thisMenu,thisItem,parentMenu,parentItem){if(!thisMenu.ctSubMenu)thisMenu.ctSubMenu=new Array();if(parentItem){if(!thisMenu.ctParent){thisMenu.ctParent=parentItem;thisMenu.ctLevel=parentItem.ctLevel+1;parentMenu.ctSubMenu[parentMenu.ctSubMenu.length]=thisMenu;}}if(thisItem){if(!thisItem.ctMenu){thisItem.ctMenu=thisMenu;thisMenu.ctLevel=thisItem.ctLevel;if(!thisMenu.ctItems)thisMenu.ctItems=new Array();thisMenu.ctItems[thisMenu.ctItems.length]=thisItem;}}};function ctLabelMenu(item){var thisMenu=ctGetThisMenu(item);while(thisMenu&&thisMenu.ctLevel!=0){thisMenu.ctCurrentItem=item;thisMenu=ctGetThisMenu(thisMenu.ctParent);}};function ctHideMenu(item,activeItem){var subMenu;while(item){if(item.ctIdSub&&(subMenu=ctGetObject(item.ctIdSub)).ctLevel&&(subMenu.ctCurrentItem!=activeItem)){ctCloseFolder(item);}item=ctGetThisMenu(item).ctParent;}};function ctGetThisMenu(item){var str=_ctTreeList[item.ctTreeIndex].prefix;if(item.ctLevel==0)str+='TreeLevel0';else{var themeLevel=_ctTreeList[item.ctTreeIndex].nodeProperties.themeLevel;var lvl=(item.ctLevel<themeLevel)?item.ctLevel:themeLevel;str+='TreeLevel'+lvl;}while(item){if(item.className==str)return item;item=item.parentNode;}return null;};function ctHasNextItem(index,tree){if(index<(tree.length-2)||(index==(tree.length-2)&&tree[index+1]))return true;else return false;};function ctGetDefaultClassName(item){var tree=_ctTreeList[item.ctTreeIndex];return tree.prefix+'Row';};function ctIsDefaultItem(item){if(item[0]==_ctNoAction)return false;return true;};function ctGetObject(id){if(document.all)return document.all[id];return document.getElementById(id);};function ctGetProperties(obj){var msg=obj+':\n';var i;for(i in obj)msg+=i+' = '+obj[i]+'; ';return msg;} 