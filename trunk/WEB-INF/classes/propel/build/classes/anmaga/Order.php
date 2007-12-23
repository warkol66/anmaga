<?php
require_once 'anmaga/om/BaseOrder.php';

/** 
 * The skeleton for this class was autogenerated by Propel  on:
 *
 * [05/04/07 12:39:42]
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package anmaga 
 */
class Order extends BaseOrder {

        /*
        * Obtiene el nombre del estado.
        * 
        * @return string Nombre del estado
        */
        function getStateName() {
                return OrderPeer::getStateNameFromNumber($this->getState());
        }
        
                /**
         * Agrega un Item a la Orden de Pedido
         *
         *
         * 
         */
        function addItem ($productId,$productId,$price,$quantity) {

                try {
                        $item = OrderItemPeer::create($this->getId(),$productId,$price,$quantity);
                }
                catch(PropelException $exp) {
                        return false;
                }

                //se agrego satisfactoriamente

                
                $total = $this->getTotal();
                $this->setTotal($total + ($price * $quantity));

                try {
                        $this->save();
                }
                catch (PropelException $exp){
                        return false;
                }

                return $item;

        }
        
        function deleteItem($itemId) {
                
                $item = OrderItemPeer::get($itemId);
                $oldQuantity = $item->getQuantity();
                $oldPrice = $item->getPrice();
                
                if (!OrderItemPeer::delete($itemId))
                        return false;
                $total = $this->getTotal();
                $this->setTotal($total - ($oldQuantity * $oldPrice));
                
                $this->save();
                
                return true;
        }
        
        function updateQuantityItem($itemId,$quantity) {
                
                $item = OrderItemPeer::get($itemId);
                $oldQuantity = $item->getQuantity();
                $price = $item->getPrice();
                
                $item->setQuantity($quantity);
                try {
                        $item->save();
                } catch (PropelException $exp) {
                        return false;
                }
                
                $total = $this->getTotal() - ($oldQuantity * $price) + ($quantity * $price);
                $this->setTotal($total);
                
                try {
                        $this->save();
                } catch (PropelException $exp) {
                        return false;
                }
                
                return true;
                
        }

        function getTotalFormat() {
        
        	return number_format($this->getTotal(),2,",",".");
        }
        /**
         * Devuelve la fecha en la que fue Creada la Order
         *
         */
        function getDateCreated() {
        
                $date = getdate(strtotime($this->getCreated()));
                return  $date['year'] . "-" . $date['mon'] . "-" . $date['mday'];
        
        }
        /*
         * Permite modificar la fecha en la que fue modificada la orden
         *
         */
        function setDateCreated($date) {
                 
                //$date = new DateTime($date);
                //$dateTimeString = $date->format('Y-m-d H:i:s');
                $this->setCreated($date);
                
                try {
                        $this->save();
                }
                catch (PropelException $exp) {
                        return false;
                }
                
                return true;
        
        }
}