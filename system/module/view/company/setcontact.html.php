<?php include commonModel::get('header.admin');?>
<div class='panel'>
  <div class='panel-heading'><strong><i class='icon-phone'></i> <?php echo $lang->company->setContact;?></strong></div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->company->contacts;?></th> 
          <td class='w-p40'><?php echo html::input('contacts', isset($contact->contacts) ? $contact->contacts : '', "class='form-control'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->company->phone;?></th> 
          <td><?php echo html::input('phone',  isset($contact->phone) ? $contact->phone : '', "class='form-control'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->company->fax;?></th> 
          <td><?php echo html::input('fax', isset($contact->fax) ? $contact->fax : '', "class='form-control'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->company->email;?></th> 
          <td><?php echo html::input('email', isset($contact->email) ? $contact->email : '', "class='form-control'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->company->qq;?></th> 
          <td><?php echo html::input('qq', isset($contact->qq) ? $contact->qq : '', "class='form-control'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->company->weixin;?></th> 
          <td><?php echo html::input('weixin', isset($contact->weixin) ? $contact->weixin : '', "class='form-control'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->company->weibo;?></th> 
          <td>
            <div class="input-group">
              <span class="input-group-addon">http://weibo.com/</span>
              <?php echo html::input('weibo', isset($contact->weibo) ? $contact->weibo : '', "class='form-control'");?>
            </div>
          </td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->company->wangwang;?></th> 
          <td><?php echo html::input('wangwang', isset($contact->wangwang) ? $contact->wangwang : '', "class='form-control'");?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->company->site;?></th> 
          <td>
            <div class="input-group">
              <span class="input-group-addon">http://</span>
              <?php echo html::input('site', isset($contact->site) ? $contact->site : '', "class='form-control'");?>
            </div>
          </td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->company->address?></th> 
          <td colspan='2'><?php echo html::input('address', isset($contact->address) ? $contact->address : '', "class='form-control'");?></td> 
        </tr>
        <tr>
          <th></th>
          <td colspan='2'>
            <?php echo html::submitButton();?>
          </td>
        </tr>
      </table>
    </form>    
  </div>
</div>
<?php include commonModel::get('footer.admin');?>
