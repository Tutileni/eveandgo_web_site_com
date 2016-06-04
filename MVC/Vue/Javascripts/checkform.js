			
<script  type="text/javascript">
			
			
email1=document.getElementById('e_mail1').value;
email2=document.getElementById('e_mail2').value;
pseudo=document.getElementById('pseudo').value;
nom=document.getElementById('nom').value;
prenom=document.getElementById('prenom').value;
			
			function verifMail1(champ)

			{

			   var regex1 = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

			   if(!regex1.test(champ.value) || email1.value== "")

			   {

					champ.style.backgroundColor = "#fba";
				  return false;

			   }

			   else

			   {

				champ.style.backgroundColor = "#80ffaa";

				return true;

			   }

			}
			
			function verifMail2(champ)

			{

			   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

			   if(!regex.test(champ.value) || email2.value=="" || email1.value != email2.value)

			   {

				  champ.style.backgroundColor = "#fba";
				  return false;

			   }

			   else

			   {

				champ.style.backgroundColor = "#80ffaa";

				return true;

			   }

			}
			
			function verifnom(champ)
			{
				var regex2 = /^[a-zA-Z \-]*$/;
				
				if(!regex2.test(champ.value) || nom.value =="" )
				{
					champ.style.backgroundColor = "#fba";
				    return false;
				}
				
				else
				{
					champ.style.backgroundColor = "#80ffaa";

					return true;
				}
			}
			
			
			function verifprenom(champ)
			{
				var regex3 = /^[a-zA-Z \-]*$/;
				
				if(!regex3.test(champ.value) || prenom.value =="" )
				{
					champ.style.backgroundColor = "#fba";
				    return false;
				}
				
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
				}
			}

			function verifadresse1(champ)
			{
				var regex4 = /^[a-zA-Z0-9 \-\,\.\/]*$/;
				
				if(!regex4.test(champ.value) || adresse1.value == "" )
				{
					champ.style.backgroundColor = "#fba";
				    return false;
				}
				
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
				}
			}
			
			function verifadresse2(champ)
			{
				var regex5 = /^[a-zA-Z0-9 \-\,\.\/]*$/;
				
				if(!regex5.test(champ.value))
				{
					champ.style.backgroundColor = "#fba";
				    return false;
				}
				
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
				}
			}
			
			function verifpseudo(champ)
			{
				if(pseudo.value == "")
				{
					champ.style.backgroundColor = "#fba";
					return false;
				}
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
					
				}
				
				
			}
			function readURL(input) {

				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#blah').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$("#imgInp").change(function(){
				readURL(this);
			});

			function verifdate(champ)

			{

			   var regex6 = /^((([1]{1})([9]{1})([0-9]{2}))|(([2]{1})([9]{1})([0-9]{2})))-(([0-0]{1}[1-9]{1})|([1-1]{1}[0-2]{1}))-((([0-0]{1})([1-9]{1}))|(([1-2]{1})([1-9]{1}))|(([3-3]{1})([0-1]{1})))$/;

			   if(!regex6.test(champ.value) )

			   {

				  champ.style.backgroundColor = "#fba";
				  return false;

			   }

			   else
			   {
				   	champ.style.backgroundColor = "#80ffaa";
					return true;
			   }
			}
			
			function verifville(champ)
			{
				var regex7 = /^[a-zA-Z \-\/]*$/;
				
				if(!regex7.test(champ.value) || ville.value =="" )
				{
					champ.style.backgroundColor = "#fba";
				    return false;
				}
				
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
				}
			}
			
			function verifpwd1(champ)
			{
				if(password1.value == "")
				{
					champ.style.backgroundColor = "#fba";
					return false;
				}
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
					
				}
				
				
			}
			
			function verifpwd2(champ)
			{
				if(pasword2.value == "" || password1.value != pasword2.value)
				{
					champ.style.backgroundColor = "#fba";
					return false;
				}
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
					
				}
			}
			
			function verifregion(champ)
			{
				if(region.value == "none")
				{
					champ.style.backgroundColor = "#fba";
					return false;
				}
				else
				{
					champ.style.backgroundColor = "#80ffaa";
					return true;
					
				}
				
				
			}
</script>