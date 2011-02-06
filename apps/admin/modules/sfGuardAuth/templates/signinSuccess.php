<?php use_helper('I18N') ?>

<?php echo $form->renderGlobalErrors() ?>
<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table>
    <tbody>
      <tr>
        <td class="form_label">
          <?php echo $form['username']->renderLabel() ?>
        </td>
        <td>
          <?php echo $form['username']->render() ?>
        </td>
        <td>
          <?php echo $form['username']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td class="form_label">
          <?php echo $form['password']->renderLabel() ?>
        </td>
        <td>
          <?php echo $form['password']->render() ?>
        </td>
        <td>
          <?php echo $form['password']->renderError() ?>
        </td>
      </tr>
      <tr>
        <td>
           <?php echo $form['_csrf_token']->render() ?>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>