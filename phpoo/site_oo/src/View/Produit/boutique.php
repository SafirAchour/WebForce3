

 <div class="row">
   <div class="col-md-3">
     <p class="lead">Vetements</p>
     <div class="list-group">
       <a class="list-group-item" href="">Tous</a>
       <?php foreach($categories as $cat) : ?>
         <a  class="list-group-item" href=""><?= $cat['categorie'] ?></a>
       <?php endforeach; ?>

     </div>
   </div>
   <div class="col_md_9">
     <div class="row">
       <?php foreach($produits as $produit) : ?>
         <div class="col-sm-4">
           <div class="thumbnail">
             <a href=""><img src="photo/<?= $produit['photo'] ?>" width="130" height="100"/></a>
             <div class="caption">
               <h4 class="pull-right"><?= $produit['prix'] ?>€</h4><br>
               <h4><?= $produit['description'] ?></h4>
               <p></p>

             </div>
           </div>
         </div>
       <?php endforeach; ?>
     </div>
   </div>
 </div>
