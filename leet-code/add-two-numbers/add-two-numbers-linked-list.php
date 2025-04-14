<?php

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

/**
 * This solution works for small numbers but not really large numbers -> integer overflow
 *
 * @param ListNode $l1
 * @param ListNode $l2
 * @return ListNode
 */
function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
{
    $firstNode = null;
    $currentNode = null;
    $carry = 0;

    // to solve this you are adding backwards (but the list node sort of is backwards)
    // So you can add the first numbers from the list node and carry any numbers leftover

    while ($l1 !== null || $l2 !== null || $carry !== 0) {
        // Get current digits (use 0 if list is exhausted?)
        $value1 = $l1 ? $l1->val : 0;
        $value2 = $l2 ? $l2->val : 0;

        // Calculate the sum of the two digits plus any carried-over value.
        $sum = $value1 + $value2 + $carry;

        // Calculate new digit (last digit on right) and carry (digit on the left)
        $newDigit = $sum % 10;
        $carry = intdiv($sum, 10);
        $newNode = new ListNode($newDigit);

        if (is_null($firstNode)) {
            // First iteration - create the firstNode and point the currentNode towards it
            $firstNode = $newNode;
        } else {
            // After first iteration add the new node to the next node
            $currentNode->next = $newNode;
        }

        // Move the currentNode pointer to the $newNode
        $currentNode = $newNode;

        // Move to the next nodes for listNode1 and listNode2 if they exist
        if($l1 !== null){
            $l1 = $l1->next;
        }
        if($l2 !== null){
            $l2 = $l2->next;
        }

    }

    // Return the first node containing all other nodes
    return $firstNode;
}

function printList(?ListNode $node): void {
    $values = [];
    while ($node !== null) {
        $values[] = $node->val;
        $node = $node->next;
    }
    echo "[" . implode(",", $values) . "]" . PHP_EOL;
}



$listNodeOne = new ListNode(2, new ListNode(4, new ListNode(3)));
$listNodeTwo = new ListNode(5, new ListNode(6, new ListNode(4)));
$resultOne = addTwoNumbers($listNodeOne, $listNodeTwo);
printList($resultOne);
echo "\n" ;

$listNodeOne = new ListNode(0);
$listNodeTwo = new ListNode(0);
$resultOne = addTwoNumbers($listNodeOne, $listNodeTwo);
printList($resultOne);
echo "\n" ;

$listNodeOne = new ListNode(
    9, new ListNode(
        9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9))))),
    )
);
$listNodeTwo = new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9))));
$resultOne = addTwoNumbers($listNodeOne, $listNodeTwo);
printList($resultOne);
echo "\n" ;