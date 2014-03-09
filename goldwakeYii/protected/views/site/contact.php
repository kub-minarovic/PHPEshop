<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


    <table>
        <tbody><tr>
            <td></td>
            <td colspan="2"><h3>Feedback:</h3></td>
        </tr>
        <tr>
            <td>Full name:</td>
            <td colspan="2"><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td colspan="2"><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Inquiry type:</td>
            <td colspan="2">
                <select>
                    <option>Order question</option>
                    <option>General question</option>
                    <option>Wake equipment</option>
                    <option>Surf equipment</option>
                    <option>Other</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Message:</td>
            <td colspan="2">
                <?php echo $form->labelEx($model,'body'); ?>
                <?php echo $form->textArea($model,'body',array('rows'=>10, 'cols'=>50,'placeholder'=>'Type your message/question here.')); ?>
                <?php echo $form->error($model,'body'); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo CHtml::submitButton('Submit'); ?></td>
            <td><input type="reset" name="reset" onclick="#todoJavascript" value="Reset Form"></td>
        </tr>


        </tbody></table>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>






<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>