<?php
	/*
	 * This file is ready to run as standalone example. However, please do:
	 * 1. Add tags <html><head><body> to make a complete page
	 * 2. Change relative path in $KoolControlFolder variable to correctly point to KoolControls folder 
	 */

	$KoolControlsFolder = "../../../../KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder
	require $KoolControlsFolder."/KoolListBox/koollistbox.php";
	
	$listbox = new KoolListBox("listbox");
	$listbox->styleFolder = "default";
	$listbox->AddItem(new ListBoxItem("Agentina"));
	$listbox->AddItem(new ListBoxItem("Australia"));
	$listbox->AddItem(new ListBoxItem("Brazil"));
	$listbox->AddItem(new ListBoxItem("Canada"));
	$listbox->AddItem(new ListBoxItem("Chile"));
	$listbox->AddItem(new ListBoxItem("China"));
	$listbox->AddItem(new ListBoxItem("Egypt"));
	$listbox->AddItem(new ListBoxItem("England"));
	$listbox->AddItem(new ListBoxItem("France"));
	$listbox->AddItem(new ListBoxItem("Germany"));
	$listbox->AddItem(new ListBoxItem("India"));
	$listbox->AddItem(new ListBoxItem("Indonesia"));
	$listbox->AddItem(new ListBoxItem("Kenya"));
	$listbox->AddItem(new ListBoxItem("Mexico"));
	$listbox->AddItem(new ListBoxItem("New Zealand"));
	$listbox->AddItem(new ListBoxItem("South Africa"));
	$listbox->AddItem(new ListBoxItem("USA"));


	$listbox->ButtonSettings->ShowReorder = true;
	$listbox->AutoPostBackOnReorder = (isset($_POST["check_AutoPostBackOnReorder"]))?true:false;

		
	$listbox->Init();

?>

<form id="form1" method="post">

	<div style="width:650px;">
		<div style="padding-top:10px;padding-bottom:30px;float:left">
			<?php echo $listbox->Render();?>
			
		</div>
		<div style="float:right;padding-top:10px;padding-left:30px;text-align:right;">
			<b>Re-order Configuration</b>
			<br/><hr/>
			<div style="margin-bottom:5px;vertical-align:middle;">
				<label for="check_AutoPostBackOnReorder">AutoPostBackOnReorder </label>
				<input type="checkbox" id="check_AutoPostBackOnReorder" name="check_AutoPostBackOnReorder" onchange="form1.submit()" <?php if($listbox->AutoPostBackOnReorder==true) echo "checked";?> />
			</div>
			
		</div>
		
		<div style="clear:both;"></div>	
	</div>
	
</form>