<?php
/**
 *	Date:2015年9月30日
 *	User:@author
 *	Content:@file_name
 *
 */

	class ManageAction extends Action {
	    public function __construct(&$_tpl){
	        parent::__construct($_tpl, new ManageModel());
	        $this->_action();
	        $this->_tpl->display('manage.tpl');
	    }
	    //业务流程控制器
	    private function _action(){
	        switch($_GET['action']){
	            case 'show':
                    $this->show();
	                break;
	            case 'add' :
	                $this->add();
	                break;
	            case 'update' :
	                $this->update();
	                break;
	            case 'delete' :
	                $this->delete();
	                break;
	            default:
	                Tool::alertBack('非法操作！');
	        }
	        
	    }
	    
	    //show
	    private function show(){
	        $_page = new Page($this->_model->getAllTotal(),PAGE_SIZE);
	        $this->_model->limit = $_page->limit;
	        $this->_tpl->assign('title','管理员列表');
	        $this->_tpl->assign('show', true);
	        $this->_tpl->assign('AllManage',$this->_model->getAllManage());
	        $this->_tpl->assign('page',$_page->showPage());	        
	    }
	    //add
	    private function add(){
	        if(isset($_POST['send'])){
	            if(Validate::checkNull($_POST['admin_user'])) Tool::alertBack('警告：用户名不得为空!');
	            if(Validate::checkLength($_POST['admin_user'], 2, 'min')) Tool::alertBack('警告：用户名不得小于2位!');
	            if(Validate::checkLength($_POST['admin_user'], 20, 'max')) Tool::alertBack('警告：用户名不得大于20位!');
	            if(Validate::checkLength($_POST['admin_pass'], 6, 'min')) Tool::alertBack('警告：密码不得小于6位!');
                if(Validate::checkEquals($_POST['admin_pass'], $_POST['admin_notpass'])) Tool::alertBack('密码确认必须相同');
                $this->_model->admin_user = $_POST['admin_user'];
                if($this->_model->getOneManage()) Tool::alertBack('警告：此管理员已存在！');
	            $this->_model->admin_pass = sha1($_POST['admin_pass']);
	            $this->_model->level = $_POST['level'];
	            $this->_model->addManage() ? Tool::alertLocation('新增管理员成功！', 'manage.php?action=show') : Tool::alertBack('新境管理员失败！');
	        }
	        $this->_tpl->assign('add',true);
	        $this->_tpl->assign('title','新增管理员');
	        $_level = new LevelModel();
	        $this->_tpl->assign('AllLevel',$_level->getAllLevel());
	    }
	    //update
	    private function update(){
	        if(isset($_POST['send'])){
	            $this->_model->id = $_POST['id'];
	            $this->_model->level = $_POST['level'];
	            if(trim($_POST['admin_pass'])==''){
	                $this->_model->admin_pass = $_POST['pass'];
	            }else{
	                if(Validate::checkLength($_POST['admin_pass'], 6, 'min')) Tool::alertBack('密码不得小于6位');
	                $this->_model->admin_pass = sha1($_POST['admin_pass']);
	            }	            
	            $this->_model->updateManage() ? Tool::alertLocation('修改管理员成功！', 'manage.php?action=show') : Tool::alertBack('管理员修改失败！');
	        }
	        if(isset($_GET['id'])){
	            $this->_model->id = $_GET['id'];
	            is_object($this->_model->getOneManage()) ? true : Tool::alertBack('管理员传值的id有误!');
	            $this->_tpl->assign('id',$this->_model->getOneManage()->id);
	            $this->_tpl->assign('admin_user',$this->_model->getOneManage()->admin_user);
	            $this->_tpl->assign('level',$this->_model->getOneManage()->level);
	            $this->_tpl->assign('admin_pass',$this->_model->getOneManage()->admin_pass);
	            $this->_tpl->assign('update',true);
	            $this->_tpl->assign('title','修改管理员');
	            $_level = new LevelModel();
	            $this->_tpl->assign('AllLevel',$_level->getAllLevel());
	        }else{
	            Tool::alertBack('非法操作！');
	        }
	    }
	    //delete
	    private function delete(){
	        if(isset($_GET['id'])){
	            $this->_model->id = $_GET['id'];
	            $this->_model->deleteManage() ? Tool::alertLocation('恭喜你，删除管理员成功！', 'manage.php?action=show') : Tool::alertBack('很遗憾，删除管理员失败！');
	        }else{
	            Tool::alertBack('非法操作！');
	        }
	    }
	}
?>