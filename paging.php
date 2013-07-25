<?php
	class paging{
		var $url ='';
		var $perPage=12;
		var $totPage=0;
		var $curPage=1;
		
		public function init($params = array()){
			if(count($params)> 0){
				
				foreach($params as $key => $val){
					if(isset($this->$key)){
						$this->$key = $val;
					}
				}
			}
		}
		
		public function offset(){
			$offset = ($this->curPage - 1) * $this->perPage;
			return $offset;
		}
		
		public function navigasi(){
			$link="";
			$jum = ceil($this->totPage / $this->perPage);
			if($this->curPage > 1){
				$prev = $this->curPage - 1;
				$link ="<ul><li class='paging'><a href='$this->url=1'>First</a></li> 
						<li class='paging'><a href='$this->url=$prev'> < </a></li>";
			}else{
				$link .="<ul> <li class='paging'>First</li><li class='paging'> < </li>";
			}
			for($i=$this->curPage-3;$i<$this->curPage;$i++){
				if($i < 1)
					continue;
						$angka .="<li class='paging'><a href='$this->url=$i'>$i</a></li>";			
			}
			$angka .="<li class='paging'><b>$this->curPage</b></li>";
	
			for($i=$this->curPage+1;$i<($this->curPage+4);$i++){
				if($i > $jum)
					break;
					$angka .="<li><a href='$this->url=$i'>$i</a></li>";
			}
			$link .= "$angka";
			
			if($this->curPage < $jum){
				$next = $this->curPage + 1;
				$link .="<li class='paging'><a href='$this->url=$next'> > </a></li><li class='paging'><a href='$this->url=$jum'>Last</a></li></ul>";
			}else{
				$link .="<li class='paging'> > </li>  <li class='paging'>Last</li></ul>";
			}
			return $link;
		}
	}
?>
