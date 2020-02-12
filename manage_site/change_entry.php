<script>
function changeentry(cells,y){
	if(y =='form0'){
	document.getElementById("idno0").value=cells[0].innerHTML;
	document.getElementById("news0").value=cells[1].innerHTML;
	document.getElementById("link0").value=cells[2].innerHTML;
    }
	if(y =='form1'){
	document.getElementById("idno1").value=cells[0].innerHTML;
	document.getElementById("imgname1").value=cells[1].innerHTML;
	document.getElementById("imtype1").value=cells[2].innerHTML;
	document.getElementById("descrip1").value=cells[3].innerHTML;
	document.getElementById("descrcontent1").value=cells[4].innerHTML;
	document.getElementById("link1").value=cells[5].innerHTML;
	}
	if(y =='form2'){
	document.getElementById("idno2").value=cells[0].innerHTML;
	document.getElementById("heading2").value=cells[1].innerHTML;
	document.getElementById("head_id2").value=cells[2].innerHTML;
	document.getElementById("head_class2").value=cells[3].innerHTML;
	document.getElementById("para2").value=cells[4].innerHTML;
	document.getElementById("para_id2").value=cells[5].innerHTML;
	document.getElementById("para_class2").value=cells[6].innerHTML;
	document.getElementById("a_href2").value=cells[7].innerHTML;
	document.getElementById("a_name2").value=cells[8].innerHTML;
	document.getElementById("keyword2").value=cells[9].innerHTML;
    }
	if(y =='form3'){
	document.getElementById("idno3").value=cells[0].innerHTML;
	document.getElementById("link3").value=cells[1].innerHTML;
	document.getElementById("title3").value=cells[2].innerHTML;
	document.getElementById("page_select3").value=cells[3].innerHTML;
    }
	if(y =='form4'){
	document.getElementById("idno4").value=cells[0].innerHTML;
	document.getElementById("title4").value=cells[1].innerHTML;
	document.getElementById("descrip4").value=cells[2].innerHTML;
	document.getElementById("link4").value=cells[3].innerHTML;
	document.getElementById("imgname4").value=cells[4].innerHTML;
	document.getElementById("imtype4").value=cells[5].innerHTML;
	document.getElementById("caption4").value=cells[6].innerHTML;
    }
	if(y =='form5'){
	document.getElementById("idno5").value=cells[0].innerHTML;
	document.getElementById("title5").value=cells[1].innerHTML;
	document.getElementById("para5").value=cells[2].innerHTML;
	document.getElementById("img_nam5").value=cells[3].innerHTML;
	document.getElementById("imtype5").value=cells[4].innerHTML;
	document.getElementById("float_pos5").value=cells[5].innerHTML;
    }
	if(y =='form6'){
	document.getElementById("idno6").value=cells[0].innerHTML;
	document.getElementById("img_nam6").value=cells[1].innerHTML;
	document.getElementById("imtype6").value=cells[3].innerHTML;
	document.getElementById("a_href6").value=cells[5].innerHTML;
	document.getElementById("a_name6").value=cells[7].innerHTML;
	document.getElementById("categry6").value=cells[9].innerHTML;
    }
	if(y =='form61'){
	document.getElementById("idno61").value=cells[0].innerHTML;
	document.getElementById("Meet_id61").value=cells[1].innerHTML;
	document.getElementById("para_F_L61").value=cells[2].innerHTML;
	document.getElementById("para_ord61").value=cells[3].innerHTML;
	document.getElementById("Title61").value=cells[4].innerHTML;
	document.getElementById("Artcl_class61").value=cells[5].innerHTML;
	document.getElementById("subtitle61").value=cells[6].innerHTML;
	document.getElementById("Speaker61").value=cells[7].innerHTML;
	document.getElementById("img_nam61").value=cells[8].innerHTML;
	document.getElementById("imtype61").value=cells[9].innerHTML;
	document.getElementById("im_float61").value=cells[10].innerHTML;
	document.getElementById("Para61").value=cells[11].innerHTML;
    }
	if(y =='form7'){
	document.getElementById("idno7").value=cells[0].innerHTML;
	document.getElementById("title7").value=cells[1].innerHTML;
	document.getElementById("para7").value=cells[2].innerHTML;
	document.getElementById("img_nam7").value=cells[3].innerHTML;
	document.getElementById("imtype7").value=cells[4].innerHTML;
	document.getElementById("im_alt7").value=cells[5].innerHTML;
	document.getElementById("a_href7").value=cells[6].innerHTML;
	document.getElementById("a_name7").value=cells[7].innerHTML;
    }
	if(y =='form8'){
	document.getElementById("idno8").value=cells[0].innerHTML;
	document.getElementById("title8").value=cells[1].innerHTML;
	document.getElementById("home_info8").value=cells[2].innerHTML;
	document.getElementById("down_link8").value=cells[3].innerHTML;
	document.getElementById("right_content8").value=cells[4].innerHTML;
    }
	if(y =='form9'){
	document.getElementById("idno9").value=cells[0].innerHTML;
	document.getElementById("title_h19").value=cells[1].innerHTML;
	document.getElementById("title_h39").value=cells[2].innerHTML;
	document.getElementById("img_nam9").value=cells[3].innerHTML;
	document.getElementById("imtype9").value=cells[4].innerHTML;
	document.getElementById("float_pos9").value=cells[5].innerHTML;
	document.getElementById("para9").value=cells[6].innerHTML;
	document.getElementById("rgt_cnt_ind9").value=cells[7].innerHTML;
	document.getElementById("rgt_cnt_ord9").value=cells[8].innerHTML;
    }
	if(y =='form91'){
	document.getElementById("idno91").value=cells[0].innerHTML;
	document.getElementById("e_id91").value=cells[1].innerHTML;
	document.getElementById("ul_ind91").value=cells[3].innerHTML;
	document.getElementById("ul_F_L91").value=cells[5].innerHTML;
	document.getElementById("e_time91").value=cells[7].innerHTML;
	document.getElementById("e_name91").value=cells[9].innerHTML;
	document.getElementById("e_head91").value=cells[11].innerHTML;
	document.getElementById("img_nam91").value=cells[13].innerHTML;
	document.getElementById("imtype91").value=cells[15].innerHTML;
	document.getElementById("e_flot91").value=cells[17].innerHTML;
	document.getElementById("e_pad91").value=cells[19].innerHTML;
	document.getElementById("e_li191").value=cells[21].innerHTML;
	document.getElementById("e_li291").value=cells[23].innerHTML;
	document.getElementById("e_li391").value=cells[25].innerHTML;
	document.getElementById("e_li491").value=cells[27].innerHTML;
    }
	if(y =='form10'){
	document.getElementById("idno10").value=cells[0].innerHTML;
    }
	if(y =='form11'){
	document.getElementById("idno11").value=cells[0].innerHTML;
	document.getElementById("upbox11").value=cells[1].innerHTML;
    }
	if(y =='form12'){
	document.getElementById("idno12").value=cells[0].innerHTML;
    }
	if(y =='form14'){
	document.getElementById("idno14").value=cells[0].innerHTML;
	document.getElementById("USERMAIL14").value=cells[4].innerHTML;
	document.getElementById("ISDEFAULT14").value=cells[5].innerHTML;
	document.getElementById("active14").value=cells[6].innerHTML;
    }
}
</script>