<?php /* $Id$ $URL$ */
if (!defined('W2P_BASE_DIR')) {
	die('You should not access this file directly.');
}

##
##	Companies: View Departments sub-table
##

global $AppUI, $company_id, $canEdit;

$depts = CCompany::getDepartments($AppUI, $company_id);
?>
<a name="departments-company_view"> </a>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="tbl">
    <tr>
        <?php
        $fieldList = array();
        $fieldNames = array();
        $fields = w2p_Core_Module::getSettings('departments', 'company_view');
        if (count($fields) > 0) {
            foreach ($fields as $field => $text) {
                $fieldList[] = $field;
                $fieldNames[] = $text;
            }
        } else {
            // TODO: This is only in place to provide an pre-upgrade-safe 
            //   state for versions earlier than v3.0
            //   At some point at/after v4.0, this should be deprecated
            $fieldList = array('', 'dept_name', '');
            $fieldNames = array('', 'Name', 'Users');
        }
//TODO: The link below is commented out because this view doesn't support sorting... yet.
        foreach ($fieldNames as $index => $name) {
            ?><th nowrap="nowrap">
<!--                <a href="?m=companies&a=view&company_id=<?php echo $company_id; ?>&sort=<?php echo $fieldList[$index]; ?>#departments-company_view" class="hdr">-->
                    <?php echo $AppUI->_($fieldNames[$index]); ?>
<!--                </a>-->
            </th><?php
        }
        ?>
    </tr>
<?php
if (count($depts)) {
	foreach ($depts as $dept) {
		if ($dept['dept_parent'] == 0) {
			echo showchilddept_comp($dept);
			findchilddept_comp($depts, $dept['dept_id']);
		}
	}
} else {
    echo '<tr><td colspan="'.count($fieldNames).'">' . $AppUI->_('No data available') . '</td></tr>';
}

echo '
<tr>
	<td colspan="3" nowrap="nowrap" rowspan="99" align="right" valign="top" style="background-color:#ffffff">';
if ($canEdit) {
	echo '<input type="button" class=button value="' . $AppUI->_('new department') . '" onclick="javascript:window.location=\'./index.php?m=departments&amp;a=addedit&amp;company_id=' . $company_id . '\';" />';
}
echo '</td></tr>';
?>
</table>