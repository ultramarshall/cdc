<?
function load_page(){
switch ($_GET['page']) {
	case 'a':
		#alska;
		break;
	
	default:
		echo "<script>document.location.href='dashboard.php'</script>";
		break;
	}
}

?>