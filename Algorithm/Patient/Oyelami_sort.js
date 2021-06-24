//Only accept two values, which means two attributes to display 
//will take longer time to map all values if included
//still algo works
function sortItems(array, mapper) {
	let swapped = true;
	do {
		swapped = false;
		for (let j = 0; j < array.length; j++) {
			if (array[j] > array[j + 1]) {
				let temp = array[j];
                let tempMapper = mapper[j];
                
                
                
				array[j] = array[j + 1];
                mapper[j] = mapper[j+1];
                
                
				array[j + 1] = temp;
                mapper[j+1] = tempMapper;
                
                
				swapped = true;
			}
		}
	} while (swapped);
	//return [array, mapper];
}


//Oyelami Function
function Oyelami_sort(array, mapper){
	while(i<j-1) {
    
    	if (array[i] > array[j-1]){
        	let temp = array[i];
            let tempMapper = mapper[i];
            
            array[i] = array[j-1];
            mapper[i] = mapper[j-1];
            
            
            array[j-1] = temp;
            mapper[j-1] = tempMapper;
            
            }//end of if statement
                i=i+1;
				j=j-1;	
    }//end  of while loop

	//return [array, mapper];
}//end of function Oyelami_sort




//cocktail function
function cocktailSort(arr,mapper) {
	//Start and end is used to keep track of where the beginning and the end of the array is at
	//to determine where needs to be checked for sorting
	//Swapped is our conditional to check if everything is sorted
	let start = 0, end = arr.length, swapped = true;

	while (swapped) {
		//Setting the flag to false, in case it is true from the previous iteration
		swapped = false;

		//Bubble sort from the left side of the array to the right, moving the largest.
		for (let i = start; i < end - 1; i++)
		{
			if (arr[i] > arr[i+1]) {
				let temp = arr[i];
                let tempMapper = mapper[i];
                
				arr[i] = arr[i+1];
                mapper[i] = mapper[i+1];
                
                
				arr[i+1] = temp;
                mapper[i+1] = tempMapper;
                
                
				swapped = true;
			}
		}

		//This is to update the end, so that next iteration, we don't have to check this index.
		end--;

		//If everything is already sorted, we can break out of the loop early.
		if (!swapped)
		{
			break;
		}

		//Setting the flag to false, so it can be used for the next phase
		swapped = false;

		//Reverse Bubble sort, moving the smallest to the front.
		for (let i = end - 1; i > start; i--)
		{
			if (arr[i - 1] > arr[i])
			{
				let temp = arr[i];
                let tempMapper1 = mapper[i];
                
                
				arr[i] = arr[i - 1];
                mapper[i] = mapper[i-1];
                
                
				arr[i - 1] = temp;
                mapper[i-1] = tempMapper1;
                
                
				swapped = true;
			}
		}

		//This is to update the beginning, so that next iteration, we don't have to check this index.
		start++;
	}

	//return [arr, mapper];
}
