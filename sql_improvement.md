# SQL Performance Improvement (Explanation)

The original query suffers from long execution time (~8 seconds) due to several performance bottlenecks. Below are the identified issues and suggested improvements:

## Issues:

1. Use too many `LEFT JOIN`s   
   - Many joined tables for example = ('jobs_personalities', 'jobs_tools'); may return null and not all required.

2. Multiple and not required 'LIKE '%keyword%'' searches  
   - Searching across more than 20 columns with same value without using indexing can required full table scans, which are very slow.

3. Overselecting columns 
   - The query retrieves almost every column from all joined tables and increasing memory usage.

4. Filters applied after joining  
   - The main filters such as 'publish_status = 1' and 'deleted IS NULL' are applied later, after datasets joined.

5. Lack of indexing 
   - This should be a big issue because missing indexes on commonly used columns such as  'job_category_id' and 'job_type_id'.

---

## Suggested Improvements:

- Use 'INNER JOIN' instead of 'LEFT JOIN' (related data must exist).
- Apply filtering conditions (`deleted IS NULL`, `publish_status = 1`) at first.
- Replace `LIKE '%keyword%'` with `FULLTEXT` search on relevant text fields if supported by the MySQL version.
- Select only the necessary columns that are actually used in the output.
- Add indexes on all foreign key columns and frequently filtered/searchable columns.

---

